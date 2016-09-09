<?php
/**
* File Name :AddUser.blade.php
* File Path :view/pages/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : admin user addition page
*
*/
?>

@extends('master')

@section('title')
    UserAddition
@stop
@section('headsection')
    <link rel="stylesheet" href="assets/css/Registration.css">
@stop

@section('body')
    @include('partials.Header')   
    @include('partials.Registration')
@stop