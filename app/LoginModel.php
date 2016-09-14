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
        $this->request = $this->fmcon->newFindCommand('USER');
    }
    
    /**
     *@param String $mail
     *@param String $pswd
     *@return boolean
     */
    public function getRecord($mail="",$pswd="")
    {
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
            return true;
        }
        return false;
    }
}
