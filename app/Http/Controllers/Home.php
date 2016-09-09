<?php
/**
* File Name :Home.php
* File Path :Controller/Home.php
* Author :Manish Kumar
* Date of creation :02/09/2016
* Comments if any : this is home page where user is redirected if user-id and password is correct.
*
*/
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests;
use App\UserReg;
//use FileMaker;

class Home extends Controller
{
    /**
     *@param void
     *@return view pages.Registration
     */
    public function index()
    {
        return view('pages.Registration');
    }
    
    /**
     *@param objectofRegistration  $request
     *@return view pages.Home
     *@uses UserReg::addUser($name,$mail,$contact,$pswd)    to add user 
     */
    public function store(RegistrationRequest $request)
    {
        $name=$_GET["name"];
        $mail=$_GET["mail"];
        $contact=$_GET["mobile"];
        $pswd=$_GET["pswd"];
        
        echo $name." ".$mail;
       $c=new UserReg();
       $c->addUser($name,$mail,$contact,$pswd);
       $c->find();
    }
    /**
     *@param void
     *@return void
     *@uses UserReg::checkMail($mail)  to verify mail-id is present or not.
     */
    public function checkMail()
    {
        $mail=$_REQUEST["q"];
        $obj=new UserReg();
        $result=$obj->checkMail($mail);
        if($result)
            echo "email_id is already present";
    }

}
