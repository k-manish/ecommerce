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
        $this->request = $this->fmcon->newFindAllCommand('Cart');
    }
    
    /**
     *@param int $id
     *@return int no-of-product in cart
     */
    public function numOfOrder($id)
    {
        $this->request->addFindCriterion('user_id_fk', "==$id");
        $result = $this->request->execute();
        $recordcount = $result->getFoundSetCount();
        return $recordcount;
    }
}
