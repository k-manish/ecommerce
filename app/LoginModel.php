<?php

/**
* File Name :LoginModel.php
* File Path :App/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : 
*
*/

namespace App;

use FileMaker;
use App\config\dbconfig;
use Session;

class LoginModel extends FileMaker
{
    /**
     *@var object
     */
    protected $fmcon;
    
    /**
     *@var object
     */
    protected $request;

    public function __construct()
    {
        $this->fmcon = new FileMaker(dbname,ipaddr,username,password);
        $this->request = $this->request = $this->fmcon->newFindCommand('USER');
        
    }
    
    /**
     *@param String $mail
     *@param String $pswd
     *@return boolean
     */
    public function getRecord($mail="",$pswd="")
    {
        /*$request1=$this->fmcon->newFindRequest('USER');
        $request1->addFindCriterion("mail_id", $mail);
        $request1->addFindCriterion("password", $pswd);
        
        $compoundfind = $this->fmcon->newCompoundFindCommand('USER');
        $compoundfind->add(1, $request1);
        
        $result = $compoundfind->execute();
        return $result;
        if(Filemaker::isError($result)) {
              return false;
        }
        $records = $result->getRecords();
        $record=$records[0];
        Session::put('userid',$record->getField("id"));
        if ( $record->getField('parent_id_fk') != null ) {
            Session::put('admin', false);
        }
        Session::put('admin', true);
        return true; */
        
        
        $this->request->addFindCriterion("mail_id","==$mail");
        $result = $this->request->execute();
        if(Filemaker::isError($result)) {
              return false;
         }
        $records = $result->getRecords();
        $record=$records[0];
        if($record->getField("password")==$pswd)
        {
            Session::put('userid',$record->getField("id"));
            if ( $record->getField('parentId_fk') == null) {
                Session::put('admin', true);
            } else {
                Session::put('admin', false);
            }
            return true;
        }
        return false;
    }
}
