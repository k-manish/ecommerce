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
    @if ( Session::get('admin') )
        @include('partials.Header')
    @else
        @include('partials.UserHeader')
    @endif
    
    @if (session('rmsg'))
        <div class="alert alert-success">
            {{ session('rmsg') }}
        </div>
    @endif  
@stop

@section('footer')
    <script src=assets/js/Cart.js></script>
@stop