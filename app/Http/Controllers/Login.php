<?php
/**
* File Name :Login.php
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
use App\LoginModel;
use Session;
class Login extends Controller
{
    /**
     *@var String
     */
    protected $userid;
    
    /**
     *@var String
     **/
    protected $pswd;
    
    /**
     *@param void;
     *@return void;
     */
    public  function __construct()
    {
        $this->userid="";
        $this->pswd="";
    }
    /**
     *@param void
     *@return void
     */
    public function setdata()
    {
        $this->userid=$_REQUEST["userid"];
        $this->pswd=$_REQUEST["pswd"];
    }
    /**
     *@param void
     *@return view
     */
    public function index()
    {
        $this->setdata();
        $c=new LoginModel();
        $result=$c->getRecord($this->userid,$this->pswd);
        if($result){
            Session::put('user',$this->userid);
            return redirect('MainPage');
        }
        return redirect('')->with('error','You can\'t login now');
    }
}
