@extends('master')

@section('title')
    productDetail
@stop

@section('body')
    @include('partials.header')
    
    <div class="container row">
        <div class="col-sm-12 col-md-4 col-md-5">
            <img src={{ asset($result['path']) }} width=400 height=300></img>
        </div>
        <div class="col-sm-12 col-md-8 col-md-7">
            <div>Name:- {!! $result['name'] !!} </div>
            <div>Price: {{ $result['price'] }}</div>
            <div>quantity : {{ $result['qty'] }}</div>
        </div>
@stop
