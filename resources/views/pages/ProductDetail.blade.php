@extends('master')

@section('body')
    @include('partials.UserHeader')
    <div class="container row">
        @if ( count($result))
            @for ( $j=0; $j< count($result); $j++ )
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="productdetail/{!! $result[$j]['img'] !!}">
                        <div><img src={{ asset($result[$j]['path']) }} height="300" width="400"></div>
                        <div><h3>Name: {!! $result[$j]['name'] !!}</h3></div>
                        <div>price: {!! $result[$j]['price'] !!}</div>
                    </a>
                </div>
            @endfor
        @endif
    </div><br>
@stop