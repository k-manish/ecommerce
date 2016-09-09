<?php

/**
* File Name :AddedUserModel.php
* File Path :App/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : 
*
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use FileMaker;
use App\config\dbconfig;
class AddedUserModel extends FileMaker
{
    /**
     *@var object store object of Filemaker class
     */
    protected $fmcon;
    
    /**
     *@var object
     */
    protected $records;
    
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
     *@return array
     */
    public function getRecord($mail)
    {
        $rarr=array();
        $this->request->addFindCriterion('mail_id', "==$mail");
        $result = $this->request->execute();
        $this->records = $result->getRecords();
        
        foreach($this->records as $record)
        {
            $record1=$record->getRelatedSet('user_SELF_id_parentID');
            if(FileMaker::isError($record1)){
                //return array of zero length
                return $rarr;
            }
            foreach($record1 as $record2)
            {
                $arr=array();
                $arr['name']=$record2->getField('user_SELF_id_parentID::name');
                $arr['mail']=$record2->getField('user_SELF_id_parentID::mail_id');
                $arr['mobile']=$record2->getField('user_SELF_id_parentID::mobile');
                array_push($rarr,$arr);
            }
        }
        return $rarr;
    }
}
