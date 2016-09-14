<?php

/**
* File Name :EditDetail.blade.php
* File Path :resource/pages/
* Author :Manish Kumar
* Date of creation :13/09/2016
* Comments if any : 
*
*/
?>
@extends('master')

@section('title')
    editdetail
@stop

@section('headsection')
    <link rel="stylesheet" href="../assets/css/Registration.css">
@stop
@section('body')
<div class='container primediv'>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>                        
            @endforeach
        </ul>
    @endif
    <h5 id="error"></h5>
    <form action='http://localhost/ecommerce/public/updateinfo'>
        <div class="form-group">
            <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" name='uid' id="uid" value={!! $result['id'] !!} readonly>
        <div class="form-group">
            <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">Name:-</label>
            <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" id="name" name="name"
                    value={!! $result['name'] !!} autofocus>
        </div>
        <div class="form-group">
            <label for="Email" class="control-level col-sm-2 com-md-2 com-lg-2">Email-id:-</label>
            <input type="email" class="form-control com-sm-2 com-md-2 com-lg-2" id="mail" name="mail"
                    value={!! $result['mail'] !!} onfocusout="checkMail()" >
        </div>
        <div class="form-group">
            <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">Contect-No:-</label>
            <input type="text" name="mobile" class="form-control com-sm-2 com-md-2 com-lg-2"
                    value={!! $result['mobile'] !!} id="mobile" placeholder="enter mobile number">
        </div>
        <div class="form-group">
            
            <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2"
                     id="pswd" name="pswd" value={!! $result['pswd1'] !!}
                     placeholder="enter new password">
        </div>
        <div class="form-group">

            <input type="password" class="form-control com-sm-2 com-md-2 com-lg-2"
                    id="c_pswd" name="c_pswd" value={!! $result['pswd2'] !!}
                    placeholder="re-enter your password" style="display:none">
        </div>
                
        <div class="form-group">
            <input type="submit" class="form-control com-sm-2 com-md-2 com-lg-2" id="btn_sub">
        </div>
    </form>
</div>
@stop    