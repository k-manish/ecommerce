<?php
/**
* File Name :UserProfile.blade.php
* File Path :view/pages/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any :display user detail
*
*/
?>

@extends('master')

@section('title')
Mainpage
@stop


@section('body')

@include('partials.Header')
<div class="container" style="background-color:rgb(70,200,200)">
    <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">Name:-</div>
        <div class="col-sm-6 col-md-6 col-lg-6">{!!$record['name']!!}</div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">Name:-</div>
        <div class="col-sm-6 col-md-6 col-lg-6">{!!$record['mail_id']!!}</div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">Name:-</div>
        <div class="col-sm-6 col-md-6 col-lg-6">{!!$record['contact']!!}</div>
    </div>
</div>
@stop