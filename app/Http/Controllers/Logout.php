<?php
/**
* File Name :Logout.php
* File Path :Controller/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : destroy all session variable
*
*/
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
class Logout extends Controller
{
    /**
     *@param void
     *@return void
     */
    public function index()
    {
        Session::flush();
        return redirect('');
    }
}
