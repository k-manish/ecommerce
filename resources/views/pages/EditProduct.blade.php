@extends('master')

@section('title') 
    AddProduct
@stop

@section('headsection')
    <link rel="stylesheet" type="text/css" href={{public_path()}} . "assets/css/Product.css">
@stop

@section('body')
    @include('partials.header')
<div class="container primeprod">
<h3>Fill the Product detail ...</h3>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>                        
            @endforeach
        </ul>
    @endif
<form class="form-horizontal" action= {{url('/')}}/updateproductinfo  method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="product name" class="control-level col-sm-2 col-md-2 col-lg-2 lb">Id:-</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="id" value={!! $result['id'] !!} readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="product name" class="control-level col-sm-2 col-md-2 col-lg-2 lb">Name:-</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value={!! $result['name'] !!}>
        </div>
    </div>
    <div class="form-group">
        <label for="price" class="control-level col-sm-2 col-md-2 col-lg-2 lb">price:-</label>
        <div class="col-sm-10 col-md-10 col-lg-10">
            <input type="text" class="form-control" name="price" value={!! $result['price'] !!}>
        </div>
    </div>
    <div class="form-group">
        <label for="quantity" class="control-level col-sm-2 col-md-2 col-lg-2 lb">Quantity:-</label>
        <div class="col-sm-10 col-md-10 col-lg-10">
            <input type="text" class="form-control" name="qty" value={!! $result['qty'] !!}>
        </div>
    </div>    
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>
</div>
@stop