<?php

/**
* File Name :UserReg.php
* File Path :App/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : 
*
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use FileMaker;
class UserReg extends FileMaker
{
    /**
     *@var object
     */
    protected $fmcon;
    
    /**
     *@var object
     */
    protected $cmd;
    public function __construct()
    {
        $this->fmcon = new FileMaker('demodb', '172.16.8.1', 'admin', 'mindfire');
        $this->cmd = $this->fmcon->createRecord('USER');
    }
    /**
     *@param String $name
     *@param String $mail
     *@param String $contact
     *@param String $pswd
     *@todo it needs to set return page/type
     */
    public function addUser($name,$mail,$contact,$pswd)
    {
        $this->cmd->setField('name',$name);
        $this->cmd->setField('mail_id',$mail);
        $this->cmd->setField('mobile',$contact);
        $this->cmd->setField('password',$pswd);
            
        $result = $this->cmd->commit();
        if(FileMaker::isError($result)){ 
             echo 'registration failed';
        }
        else
            echo 'registration done';
    }

    /**
     *@param String $mail
     *@return boolean
     */
    public function checkMail($str1)
    {
        $request = $this->fmcon->newFindCommand('USER');
        $request->addFindCriterion('mail_id',"==$str1");
        $result = $request->execute();
        $records = $result->getRecords();
        if($records[0]->getField("mail_id")==$str1){
            return true;
        }
        return false;
    }
}
