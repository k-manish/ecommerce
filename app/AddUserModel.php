<?php

namespace App;

use FileMaker;
use App\config\dbconfig;

class AddUserModel extends FileMaker
{
    /**
     *@var object store object of Filemaker class
     */
    protected $fmcon;
    
    public function __construct()
    {
        $this->fmcon = new FileMaker(dbname,ipaddr,username,password);
    }
    
    /**
     *@param String $name
     *@param String $mail
     *@param String $mobile
     *@param int $parentid
     *@param  String $pswd
     *@return String
     */
    public function addUser($name,$mail,$mobile,$parentid,$pswd)
    {
        $record = $this->fmcon->createRecord('USER');
        if(Filemaker::isError($record)) {
           return false;
        }
        $record->setField('name', $name);
        $record->setField('mail_id', $mail);
        $record->setField('mobile', $mobile);
        $record->setField('parentId_fk',$parentid);
        $record->setField('password',$pswd);
        $result = $record->commit();
        if(Filemaker::isError($result)) {
           return $result->getmessage();
        }
        return 'Registration Done';
    }
}
