<?php
/**
* File Name :MasterProduct.php
* File Path :App/
* Author :Manish Kumar
* Date of creation :14/09/2016
* Comments if any : 
*
*/
namespace App;

use FileMaker;

class MasterProduct extends FileMaker
{
    protected $fmcon;
    protected $request;
    protected $result;
    protected $key;
    protected $val;
    
    public function __construct()
    {
        $this->fmcon = new FileMaker(dbname,ipaddr,username,password);
    }
    
    public function insertData($layout, $arr)
    {
        $record = $this->fmcon->createRecord($layout);
        if(Filemaker::isError($record)) {
           return false;
        }
        foreach ( $arr as $key => $value ){
            $record->setField($key, $value);
        }
        $result = $record->commit();
        if(Filemaker::isError($result)) {
           return false;
        }
        return true;
    }
    
    public function getAllData($layout)
    {
        $this->request = $this->fmcon->newFindAllCommand($layout);
        $this->result = $this->request->execute();
        $records = $this->result->getRecords();
        return $records;
    }
    
    public function getAllRecords($layout, $fieldname, $fieldval)
    {
        $this->request = $this->fmcon->newFindCommand($layout);
        $this->request->addFindCriterion($fieldname,"==$fieldval");
        $result = $this->request->execute();
        if ( FileMaker::isError($result)) {
            return;
        }
        $records = $result->getRecords();
        return $records;
    }
    
    public function getAllProductDetail($cur, $rc, $sortarr)
    {
        $skip = ($cur-1) * $rc;
        $arr = array();
        foreach($sortarr as $key=>$value){
            $this->key = $key;
            $this->val = $value;
        }
        $this->request = $this->fmcon->newFindAllCommand('product');
        if ( $this->val == 'asc') {
            $this->request->addSortRule($this->key, 1, FILEMAKER_SORT_ASCEND);
        } else {
            $this->request->addSortRule($this->key, 1, FILEMAKER_SORT_DESCEND);
        }
        $this->request->setRange($skip, ($skip + $rc) );
        $this->result = $this->request->execute();
        $count = 0;
        if ( FileMaker::isError($this->result)) {
            $arr1=array();
            array_push($arr, $count);
            array_push($arr,$arr1);
            return $arr;
        }
        $count=$this->result->getFoundSetCount();
        array_push($arr, $count);
        $records = $this->result->getRecords();   
        foreach ( $records as $record ) {
            $arr1=array();
            $arr1['recordid'] = $record->getRecordId();
            $arr1['name'] = $record->getField('name');
            $arr1['qty'] = $record->getField('qty');
            $arr1['price'] = $record->getField('price');
            array_push($arr,$arr1);
        }
        return $arr;
    }
    
    public function getAllSearchedProductDetail($cur, $rc, $search, $sortarr)
    {
        $skip = ($cur-1) * $rc;
        $arr = array();
        foreach($sortarr as $key=>$value){
            $this->key = $key;
            $this->val = $value;
        }
        $findRequest1 = $this->fmcon->newFindRequest('Product');
        $findRequest1->addFindCriterion('name', $search);
        
        $findRequest2 = $this->fmcon->newFindRequest('product');
        $findRequest2->addFindCriterion('qty', $search);
        
        $findRequest3 = $this->fmcon->newFindRequest('USER');
        $findRequest3->addFindCriterion('price', $search);
        
        $compoundFind = $this->fmcon->newCompoundFindCommand('product');
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
        $records = $result->getRecords();
        foreach ( $records as $record ) {
            $arr1=array();
            $arr1['recordid'] = $record->getRecordId();
            $arr1['name'] = $record->getField('name');
            $arr1['qty'] = $record->getField('qty');
            $arr1['price'] = $record->getField('price');
            array_push($arr,$arr1);
        }
        return $arr;
    }
    
    public function delProduct($id)
    {
        $deleteRecord = $this->fmcon->newDeleteCommand('product', $id);
        if(FileMaker::isError($deleteRecord))
        {
            return false;
        }
        $result = $deleteRecord->execute();
        if(FileMaker::isError($result))
        {
            return false;
        }
        return true;
    }
    
    public function showProductDetail($id)
    {
        $records = $this->fmcon->getRecordById('product',$id);
        $arr = array();
        $arr['path']='assets/images/' . $records->getField('image');
        $arr['name'] = $records->getField('name');
        $arr['qty'] = $records->getField('qty');
        $arr['price'] = $records->getField('price');
        return $arr;
    }
    
    public function editProduct($id)
    {
         $records = $this->fmcon->getRecordById('product',$id);
         return $records;
    }
    
    public function updateProductInfo($id,$name,$qty,$price)
    {
        $this->request = $this->fmcon->newEditCommand('product', $id);
        $this->request->setField('name', $name);
        $this->request->setField('qty', $qty);
        $this->request->setField('price', $price);
        $res = $this->request->execute();
        if(FileMaker::isError($res))
        {
            dd($res->getMessage());
        }
        return $res;
    }
    
    public function getUserOrderDetail($lay, $userid)
    {
        $fm = new FileMaker(dbname,ipaddr,username,password);
        $request = $fm->newFindCommand($lay);
        $request->addFindCriterion('id', "==$userid");
        $result = $request->execute();
        if ( Filemaker::isError($result) ) {
            return ;
        }
        $records = $result->getRecords();
        $orderrecords = $records[0]->getRelatedSet('order_of_user');
        if(FileMaker::isError($orderrecords) ) {
            return;
        }
        $arr = array();
        foreach($orderrecords as $order) {
            $arr1['id'] = $order->getField('order_of_user::id');
            $arr1['name'] = $order->getField('order_of_user::product_name');
            $arr1['qty'] = $order->getField('order_of_user::qty');
            $arr1['price'] = $order->getField('order_of_user::price');
            $arr1['psum'] = $order->getField('order_of_user::price_sum');
            array_push($arr, $arr1);
        }
        
        return $arr;
    }
}
