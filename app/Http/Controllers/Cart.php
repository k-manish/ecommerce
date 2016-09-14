<?php

/**
* File Name :Cart.php
* File Path :Controller/
* Author :Manish Kumar
* Date of creation :13/09/2016
* Comments if any : 
*
*/

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\CartModel;

class Cart extends Controller
{
    /**
     *@param void
     *@return int no-of-product added to cart by user
     */
    public function index()
    {
        $c=new CartModel();
        $result=$c->numOfOrder(2);
        echo $result;
    }
}
