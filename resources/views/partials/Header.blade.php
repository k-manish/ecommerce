<?php
/**
* File Name :Header.blade.php
* File Path :view/pages/partials/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : nav bar- is displays at top
*
*/
?>
<div class="container row well" style="width:100%">
    <div class="col-sm-12 col-md-8 col-lg-10">
       <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">profile
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li id="l1" class="">
                    <a href="{{ action('Main@userinfo') }}" id="myprof">
                        <span class="glyphicon glyphicon-user"></span> MyProf
                    </a>
                </li>
                <li id="l2" class=""><a href="{{ action('Main@userAddition') }}" id="adduser">
                    <span class="glyphicon glyphicon-user">AddUser</a>
                </li>
                <li id="l3" class=""> <a href="{{action('Main@addedUser')}}" id="showuser">
                    <span class="glyphicon glyphicon-user">ShowUser</a>
                </li>
            </ul>
        </div> 
    </div>
    <div class="col-sm-12 col-md-2 col-lg-1 ">
        <a href="#">
            <button type="button" id="cart" class="btn btn-info"  onclick="checkOrder()">
                    <span class="glyphicon glyphicon-briefcase"></span>
                        Cart
                    <span class="badge" >0</span>
            </button>
        </a>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-1 ">
        <a href="{{action('Logout@index')}}"><button type="button" class="btn btn-info">
        <span class="glyphicon glyphicon-log-out"></span> Logout</button> </a>
    </div>
</div>