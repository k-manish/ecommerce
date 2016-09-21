<?php
/**
* File Name :.blade.php
* File Path :view/pages/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : show all added user added by admin.
*
*/
?>

@extends('master')

@section('title')
    Addeduserdetail   
@stop
@section('headsection')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css">
@stop
@section('body')
    @include('partials.Header')
    <div class="container">
        <table id="grid-data" class="table table-condensed table-hover table-striped">
            <thead>
                <tr class="onerecord">
                    <th data-column-id="recordid" data-visible="false">Id</th>
                    <th data-column-id="name">Name</th>
                    <th data-column-id="qty" >quantity</th>
                    <th data-column-id="price" data-order="asc">Price</th>
                    <th data-column-id="link" data-formatter="command" data-sortable="false" class="command">Commands</th>
                </tr>
            </thead>
        </table>
    </div><hr style="border-width: 2px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <a href="{{ action('Product@addProduct') }}"><button type=button" class="btn btn-link">add Product</button>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="assets/js/Header.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.fa.js"></script>
    <script src="assets/js/ProductBootScript.js"></script>
@stop