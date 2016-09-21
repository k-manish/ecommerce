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
use Session;

class Cart extends Controller
{
    /**
     *@param void
     *@return int no-of-product added to cart by user
     */
    public function index(Request $r)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        
        $id = $r->input('id');
        $c=new CartModel();
        $result=$c->numOfOrder($id);
        echo $result;
    }
    
    public function addToCart(Request $req)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        
        $proid = $req->input('id');
        $userid= Session :: get('userid');
        $c=new CartModel();
        $res=$c->addToCart('Cart', $userid, $proid);
    }
    
    public function cartDetail()
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        
        $obj = new CartModel();
        $userid= Session :: get('userid');
        $results = $obj->getCartproDetail($userid);
        if ( $results ) {
            return view('pages.CartDetail')->with('results',$results);
        }
        $arr = array();
        return view('pages.CartDetail')->with('results',$arr);
    }
    
    public function removeFromCart($id)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        
        $obj = new CartModel();
        $res = $obj->removeFromCart($id);
        if( $res ) {
            return redirect(url('/').'/cartdetail');
        }
    }
}
