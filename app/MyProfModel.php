<?php

/**
* File Name :MyProfModel.php
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

class MyProfModel extends Model
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
        return $arr;
    }
}
