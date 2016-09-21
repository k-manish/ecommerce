@extends('master')

@section('title')
    proddetail
@stop
@section('headsection')
   <link rel="stylesheet" type="text/css" href="{{public_path()}} . \assets\css\SpecificProductDetail.css">
@stop
@section('body')
    @include('partials.UserHeader')
    <div class='container row' >
        <div class="row">
            <div class='col-sm-12 col-md-6 col-lg-4'>
                <img src={{ asset($result['path']) }} width="400" height="200" alt="Image">
            </div>
            <div class='col-sm-12 col-md-6 col-lg-8'>
                <div><p class='spd'> Name: {!! $result['name'] !!}</p></div>
                <div><p class='spd'> Price: {{ $result['price'] }}</p></div>
                <div><p class='spd'> quantity : {{ $result['qty'] }}</p></div>
                <div>
                    <form action={{url('/')}}/placeorder id="formorder"method="post">
                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }}</li>                        
                                @endforeach
                            </ul>
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="img" id="img" value={{$result['img']}} hidden>
                        <input type="text" name="qty" id="qty" placeholder="No. of quantity">
                        <input type="submit" class="btn btn-info" id="buynow" value="buy now">
                    </form>
                </div>
                <div><button type="button" class="btn btn-info" id="addcart" value={!! $result['id'] !!}
                        onclick="addToCart()">add to cart</button></div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/OrderPlace.js')}}"></script>
@stop