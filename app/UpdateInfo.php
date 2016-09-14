<?php

/**
* File Name :MyProfModel.php
* File Path :App/
* Author :Manish Kumar
* Date of creation :13/09/2016
* Comments if any : 
*
*/

namespace App;

use FileMaker;
use App\config\dbconfig;

class UpdateInfo extends FileMaker
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
    }
    
    /**
     *@param int $id
     *@return array
     */
    public function getInfo($id)
    {
        $arr=array();
        $this->record = $this->fmcon->getRecordById('USER',$id);
        $arr['id']=$this->record->getField('id');
        $arr['name']=$this->record->getField('name');
        $arr['mail']=$this->record->getField('mail_id');
        $arr['mobile']=$this->record->getField('mobile');
        $arr['pswd1']=$this->record->getField('password');
        $arr['pswd2']=$this->record->getField('password');
        return $arr;
    }
    
    /**
     *@param int $id;
     *@param String $name
     *@param String $mail
     *@param String $mobile
     */
    public function setInfo($id,$name,$mail,$mobile)
    {
        $editRecord = $this->fmcon->newEditCommand('USER',$id);
        $editRecord->setField('name', $name);
        $editRecord->setField('mail_id', $mail);
        $editRecord->setField('mobile', $mobile);
        $result = $editRecord->execute();
        if (Filemaker::isError($result)) {
             return redirect('pages.main');
        }
         return true;
    }
}
