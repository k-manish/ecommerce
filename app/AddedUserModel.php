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
    
    protected $key;
    protected $val;
    
    
    public function __construct()
    {
        $this->fmcon = new FileMaker(dbname,ipaddr,username,password);
       
    }
    
    /**
     *@param int $id
     *@param int $cur
     *@param int $rc
     *@return array
     */
    public function getRecord($id,$cur,$rc,$sortarr)
    {
        $skip = ($cur-1) * $rc;
        $rarr=array();
        foreach($sortarr as $key=>$value){
            $this->key = $key;
            $this->val = $value;
        }
        $this->request = $this->fmcon->newFindCommand('USER');
        if ( $this->val == 'asc') {
            $this->request->addSortRule($this->key, 1, FILEMAKER_SORT_ASCEND);
        } else {
            $this->request->addSortRule($this->key, 1, FILEMAKER_SORT_DESCEND);
        }
        
        $this->request->addFindCriterion('parentId_fk', "==$id");
        $this->request->setRange($skip, ($skip + $rc) );
        $result = $this->request->execute();
        $count=$result->getFoundSetCount();
        array_push($rarr, $count);
        $this->records=$result->getRecords();
        if(Filemaker::isError($this->records)) {
            $arr1=array();
            array_push($rarr, $arr1);
            return $rarr;
        }
        foreach ( $this->records as $res) {
            $arr=array();
            $arr['recordid'] = $res->getRecordId();
            $arr['name'] = $res->getField('name');
            $arr['mail'] = $res->getField('mail_id');
            $arr['mobile'] = $res->getField('mobile');
            array_push($rarr, $arr);
        }
        return $rarr;
    }
    
    /**
     *@param int $id
     *@param String $str
     *@param int $cur
     *@param int $rc
     *@return $arr
     */
    public function getSearchedRecord($id, $str, $cur ,$rc,$sortarr)
    {
        $skip = ($cur-1) * $rc;
        $arr=array();
        $findRequest1 = $this->fmcon->newFindRequest('USER');
        $findRequest1->addFindCriterion('parentId_fk', $id);
        $findRequest1->addFindCriterion('mobile', $str);
        
        $findRequest2 = $this->fmcon->newFindRequest('USER');
        $findRequest2->addFindCriterion('parentId_fk', $id);
        $findRequest2->addFindCriterion('mail_id', $str);
        
        $findRequest3 = $this->fmcon->newFindRequest('USER');
        $findRequest3->addFindCriterion('parentId_fk', $id);
        $findRequest3->addFindCriterion('name', $str);
        
        $compoundFind = $this->fmcon->newCompoundFindCommand('USER');
        foreach($sortarr as $key=>$value){
            $this->key = $key;
            $this->val = $value;
        }
        if ( $this->val == 'asc') {
            $compoundFind->addSortRule($this->key, 1, FILEMAKER_SORT_ASCEND);
        } else {
            $compoundFind->addSortRule($this->key, 1, FILEMAKER_SORT_DESCEND);
        }
        
        $compoundFind->add(1, $findRequest1);
        $compoundFind->add(2, $findRequest2);
        $compoundFind->add(3, $findRequest3);

        $compoundFind->setRange($skip, ($skip + $rc) );
        $result = $compoundFind->execute();
        $count=0;
        
        if ( FileMaker::isError($result)) {
            $arr1=array();
            array_push($arr, $count);
            array_push($arr,$arr1);
            return $arr;
        }
        $count=$result->getFoundSetCount();
        array_push($arr, $count);
        $this->records = $result->getRecords();
            
        foreach ( $this->records as $record ) {
            $arr1=array();
            $arr1['recordid'] = $record->getRecordId();
            $arr1['name'] = $record->getField('name');
            $arr1['mail'] = $record->getField('mail_id');
            $arr1['mobile'] = $record->getField('mobile');
            array_push($arr,$arr1);
        }
        return $arr;
    }
}
