@extends('master')

@section('title')
    OrderPlace
@stop
@section('headsection')
    <link rel="stylesheet" type="text/css" href="assets/css/OrderPlace.css">
@stop
@section('body')
    @include('partials.UserHeader')
    <div class="container">
        <form class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">Product Id:-</label>
                <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" id="id" name="id"
                    value={!! $result['id'] !!} readonly>
            </div>
            <div class="form-group">
                <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">Name:-</label>
                <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" id="name" name="name"
                    value={!! $result['name'] !!} readonly>
            </div>
            <div class="form-group">
                <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">price:-</label>
                <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" id="price" name="price"
                    value={!! $result['price'] !!} readonly>
            </div>
            <div class="form-group itemqty">
                <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" id="qty" name="qty"
                    value={!! $result['qty'] !!}>
            </div>
            <div class="form-group">
                <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">Quantity:-</label>
                <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" id="oqty" name="oqty"
                    value={!! $result['oqty'] !!} readonly>
                <p id="qtyerror"></p>
            </div>
            <div class="form-group">
                <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">total price:-</label>
                <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" id="tprice" name="tprice"
                    value={!! $result['total'] !!} readonly>
            </div>
                <div class="form-group">
                <input type="submit" class="form-control btn-warning com-sm-2 com-md-2 com-lg-2" id="btn_sub" value="pay now">
            </div>    
        </form>
    </div>
    <script src="assets/js/OrderPlace.js"></script>
@stop
