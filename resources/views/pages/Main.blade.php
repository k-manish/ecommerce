<?php
/**
* File Name :Main.blade.php
* File Path :view/pages/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : 
*
*/
?>

@extends('master')

@section('title')
Mainpage
@stop

@section('headsection')
    <link rel="stylesheet" href="assets/css/SideDiv.css">
@stop


@section('body')
    @include('partials.Header')
    
@stop

@section('footer')
    <script src=assets/js/Cart.js></script>
@stop