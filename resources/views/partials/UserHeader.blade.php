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
<body onload=checkOrder()>
<div class="container-fluid row well" style="width:100%">
    <div class="col-sm-12 col-md-6 col-lg-9">
        <div class="col-sm-12 col-md-2 col-lg-1 ">
            <a href="{{action('Main@userinfo')}}"><button type="button" class="btn btn-info">
            <span class="glyphicon glyphicon-user"></span> MyProfile</button> </a>
        </div>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-1 ">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">product
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li id="l1">
                    <a href="{{ action('Order@getUserOrderDetail') }}" id="odetail"> order detail </a>
                </li>
                <li id="l2"><a href="{{ action('Product@getAllProductDetail') }}" id="pdetail"> product detail</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-1 ">
        <a href="{{action('Cart@cartDetail')}}">
            <button type="button" id="cart" class="btn btn-info" value={{Session::get('userid')}}>
                    <span class="glyphicon glyphicon-briefcase"></span>
                        Cart
                    <span class="badge" >0</span>
            </button></frame>
        </a>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-1 ">
        <a href="{{action('Logout@index')}}"><button type="button" class="btn btn-info">
        <span class="glyphicon glyphicon-log-out"></span> Logout</button> </a>
    </div>
</div>

