<?php

/**
* File Name :Main.php
* File Path :Controller/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : 
*
*/
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\AddedUserModel;
use App\MyProfModel;
use Session;
class Main extends Controller
{
    /**
     *@param void
     *@return view
     */
    public function index()
    {
        if(!(Session::has('user'))){
               return redirect('');
        }
        return view("pages.Main");
    }
    
    /**
     *@param void
     *@return view
     */
    public function addUser()
    {
        return view("pages.AddUser");
    }
    
    /**
     *@param void
     *@return view
     *@uses AddedUserModel::getRecord()  to get info about other user added by him.
     */
    public function addedUserDetail()
    {
       if(!(Session::has('user'))){
            return redirect('');
        }
        $c=new AddedUserModel();
        $records = $c->getRecord(Session::get('user'));
        return view('pages.AddedUser')->with('result',$records);
    }
    
    /**
     *@param void
     *@return view
     *@uses MyProfModel::getDetail($mail)   to get current informetion
     */
    public function userinfo()
    {
        if(!(Session::has('user'))){
            return redirect('');
        }
        $mail=Session::get('user');
        $c=new MyProfModel();
        $result=$c->getDetail($mail);
        return view('pages.UserProfile')->with('record',$result);
    }
}
