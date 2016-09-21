<?php
/**
* File Name :AddedUserPage.blade.php
* File Path :view/pages/
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any : show all added user added by admin.
*
*/
?>

@extends('master')

@section('title')
    orderdetail
@stop
@section('headsection')
    <link rel="stylesheet" type="text/css" href="assets/css/CartDetail.css">
@stop

@section('body')
    @include('partials.UserHeader')
    <div class="container">
        @if(count($results) > 0)
            @foreach($results as $row)  
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <img src={{ $row['path']}} width=150 height=80></img>
                    </div>
                    <div class="col-sm-6 col-md-3 col-sm-3">
                        <div>Name:-{{ $row['name'] }} </div>
                        <div>Item-Avilable:-{{ $row['qty'] }} </div>
                        <div>Price:-{{ $row['price'] }} </div>
                    </div>
                    <div class="col-sm-6 col-md-2 col-sm-6 linkbutton">
                        <a href="{{url('/')}}/productdetail/{{$row['img']}}"><button type="button" class="btn btn-info">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>buy
                        </button></a>
                        <a href="{{url('/')}}/removefromcart/{{$row['recordid']}}"><button type="button" class="btn btn-info">
                                <i class="icon-remove-sign"></i>remove
                        </button></a>
                    </div>
                </div>
            @endforeach
        @else
            <div class='row'>
                <p> No Product in your Cart</p>
            </div>
        @endif
@stop
