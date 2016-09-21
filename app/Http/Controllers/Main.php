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
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\AddedUserModel;
use App\MyProfModel;
use App\UpdateInfo;
use App\AdduserModel;
use App\DelUserModel;
use Session;

class Main extends Controller
{
    /**
     *@param void
     *@return view
     */
    public function index()
    {
        /*if(!(Session::has('user'))){
               return redirect('');
        }*/
        return view("pages.Main");
    }
    
    /**
     *@param void
     *@return view
     */
    public function addUser(RegistrationRequest $request)
    {
        $name=$_REQUEST['name'];
        $mail=$_REQUEST['mail'];
        $mobile=$_REQUEST['mobile'];
        $pswd=$_REQUEST['pswd'];
        $parentid="";
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
    
        $c=new AddUserModel();
        $res=$c->addUser($name,$mail,$mobile,$parentid,$pswd);
        
        if ( $parentid != null ){
            return redirect('AddedUser')->with( 'msg',$res );
        } else {
            return redirect(' ')->with( 'msg',$res );
        }
    }
    
    /**
     *@param void
     *@return object  json-object
     *@uses AddedUserModel::getRecord()  to get info about other user added by him.
     */
    public function addedUserDetail()
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        
        $cur=$_REQUEST['current'];
        $rc=$_REQUEST['rowCount'];
        $id=Session::get('userid');
        $sort=$_REQUEST['sort'];
        $sortarr = array();
        if ( array_key_exists('name',$sort) ) {
            $sortarr['name'] = $sort['name'];
        } elseif ( array_key_exists('mail',$sort) ) {
            $sortarr['mail_id'] = $sort['mail'];
        } else {
            $sortarr['mobile'] = $sort['mobile'];
        }
        $c=new AddedUserModel();
        
        if ( $_REQUEST['searchPhrase'] != null) {
            $records = $c->getSearchedRecord($id, $_REQUEST['searchPhrase'], $cur, $rc,$sortarr);    
        } else {
            $records = $c->getRecord($id,$cur,$rc,$sortarr);
        }
        $totalrecord=array_shift($records);
        $jsonarr=array(
            "current"=>$_REQUEST['current'],
            "rowCount"=>$_REQUEST['rowCount'],
            "rows"=>$records,
            "total"=>$totalrecord
        );
        echo json_encode($jsonarr);
        
    }
    
    /**
     *@param void
     *@return object   redirect to other page
     */
    public function addedUser()
    {
        if ( !( Session::has('user'))) {
            return redirect(' ');
        }
        return view('Pages.AddedUser');
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
    
    /**
     *@param void
     *@return object view-object to redirect other page
     */
    public function getEditDetail($id)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        $c=new UpdateInfo();
        $result=$c->getInfo($id);
        return view('pages.EditDetail')->with('result', $result);
    }
    /**
     *@param object
     *@return object redirect ot other page
     */
    public function updateInfo(RegistrationRequest $request)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
         $id=$request->input('uid');
         $name=$_REQUEST['name'];
         $mail=$_REQUEST['mail'];
         $mobile=$_REQUEST['mobile'];
         $c=new UpdateInfo();
         $res=$c->setInfo($id,$name,$mail,$mobile);
         if ( $res ) {
            return redirect('AddedUser');
         } else {
            return redirect('pages.Main');
         }
    }
    
    /**
     *@param void
     *@return void
     */
    public function delUser()
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        $id=$_POST['id'];
        $c=new DelUserModel();
        $res=$c->delUser($id); 
    }
    
    /**
     *@param void
     *@return  object redirect to other page
     */
    public function userAddition()
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        return view('pages.AddUser');
    }
    
    public function addedUserProfile($id)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        $c=new MyProfModel();
        $result=$c->getUserDetail('USER', $id);
        return view('pages.UserProfile')->with('record',$result);
    }
}
