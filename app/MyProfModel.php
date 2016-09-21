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
use Illuminate\Database\Eloquent\Model;
use FileMaker;
use App\config\dbconfig;

class MyProfModel extends Model
{
    
    /**
     *@var object FileMaker object
     */
    protected $fmcon;
    
    /**
     *@var object FileMaker_Command object
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
    public function getDetail($mail="")
    {
        $this->request->addFindCriterion("mail_id","==$mail");
        $result = $this->request->execute();
        $records = $result->getRecords();
        $record=$records[0];
        $arr=array();
        $arr['name']=$record->getField("name");
        $arr['mail_id']=$record->getField("mail_id");
        $arr['contact']=$record->getField("mobile");
        $arr['refered']=$record->getField("parentId_fk");
        return $arr;
    }
    
    public function getUserDetail($layout, $id="")
    {
        $record= $this->fmcon->getRecordById($layout, $id);
        $arr=array();
        $arr['name']=$record->getField("name");
        $arr['mail_id']=$record->getField("mail_id");
        $arr['contact']=$record->getField("mobile");
        $arr['refered']=$record->getField("parentId_fk");
        return $arr;
    }
}