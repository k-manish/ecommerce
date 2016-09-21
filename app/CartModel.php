<?php

/**
* File Name :CartModel.php
* File Path :App/
* Author :Manish Kumar
* Date of creation :13/09/2016
* Comments if any : 
*
*/

namespace App;

use FileMaker;
use App\config\dbconfig;

class CartModel extends FileMaker
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
        $this->request = $this->fmcon->newFindCommand('Cart');
    }
    
    /**
     *@param int $id
     *@return int no-of-product in cart
     */
    public function numOfOrder($id)
    {
        $this->request->addFindCriterion('user_id_fk', "==$id");
        $result = $this->request->execute();
        if ( FileMaker::isError($result) ) {
            $recordcount = 0;
            return $recordcount;
        }
        $recordcount = $result->getFoundSetCount();
        return $recordcount;
    }
    
    public function addToCart($layout, $userid, $proid)
    {
        $record = $this->fmcon->createRecord($layout);
        $record->setField('user_id_fk', $userid);
        $record->setField('pro_id', $proid);
        $result = $record->commit();
        return $result;
    }
    
    public function getCartproDetail($userid)
    {
        $this->request->addFindCriterion('user_id_fk', "==$userid");
        $result = $this->request->execute();
        if ( FileMaker::isError($result) ){
            return ;
        }
        $records = $result->getRecords();
        $arr = array();
        foreach($records as $record) {
            $recid = $record->getRecordId();
            $prorecord = $record->getRelatedSet('product_cart');
            if ( FileMaker::isError($prorecord)) {
                return ;
            }
            foreach($prorecord as $precord) {
                $arr1['recordid'] = $recid;
                $arr1['img'] = $precord->getField('product_cart::image');
                $arr1['name'] = $precord->getField('product_cart::name');
                $arr1['qty'] = $precord->getField('product_cart::qty');
                $arr1['price'] = $precord->getField('product_cart::price');
                $arr1['path'] = 'assets/images/'. $arr1['img'];
                array_push($arr, $arr1);
            }
        }
        return $arr;
    }
    
    public function removeFromCart($id)
    {
        $command = $this->fmcon->newDeleteCommand('Cart',$id);
        $result = $command->execute();
        return $result;
    }
}
