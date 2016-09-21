<?php
/**
* File Name :Home.blade.php
* File Path :view/pages/
* Author :Manish Kumar
* Date of creation :02/09/2016
* Comments if any : login page 
*
*/
?>


@extends('master')

@section('title')
homepage
@stop

@section('headsection')
    <link rel="stylesheet" href="assets/css/Home.css">
@stop

@section('body')
<body>
<div class="container" id="primediv">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error')}}
        </div>
    @endif 
    <p id="err_report"></p>
    <form class="form-horizontal" action="http://localhost/ecommerce/public/login" method="get">
        <div class="form-group">
            <label class="control-label col-sm-3 col-md-3 col-lg-3 lab" for="email">UserId:</label>
            <div class="col-sm-9 col-md-9 col-lg-9">
                <input type="email" class="form-control" id="userid" name="userid" placeholder="Enter email">
            </div>
        </div>
        <div class="form-group" id="div_fg_2">
            <label class="control-label col-sm-3 col-md-3 col-lg-3 lab" for="email">Password:-</label>
            <div class="col-sm-7 col-md-7 col-lg-7" s>
                <input type="password" class="form-control" id="pswd" name="pswd" placeholder="Enter password">
                <input type="text" class="form-control" id="pswd_text" placeholder="Enter password" readonly>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <input type="button" class="btn-link" id="btn_show" value="show" onclick="showhidepswd()">
            </div>
        </div>
        <div class="form-group">
            <div calss=" col-sm-6 col-md-6 col-lg-6" >
                <input type="submit" class="form-control" id="btn_submit" value="Log In">
            </div>
        </div>
    </form>
    <div class="otherlink">
        <div class="col-sm-6" >
            <a href="Registration" >register Yourself</a>
        </div>
        <div class="col-sm-6">
           <a href="#">Forgot Password</a>
        </div>
    </div>
</div>               
@stop

@section('footer')
    <script src="assets/js/Home.js"></script>
@stop