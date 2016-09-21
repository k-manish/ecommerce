@extends('master')

@section('title')
    orderdetail
@stop
@section('headsection')
    <link rel="stylesheet" type="text/css"
        href="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css">
@stop

@section('body')
    @include('partials.UserHeader')
    <table id="grid-data" class="table table-condensed table-hover table-striped">
        <thead>
            <tr class="onerecord">
                <th data-column-id="id" data-visible="false">Product-Id</th>
                <th data-column-id="name">Product-Name</th>
                <th data-column-id="qty" >quantity</th>
                <th data-column-id="price" data-order="asc">Price</th>
                <th data-column-id="price-sum" >Total-Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $row)
                <tr>
                    <td> {{ $row['id'] }} </td>
                    <td> {{ $row['name'] }} </td>
                    <td> {{ $row['qty'] }} </td>
                    <td> {{ $row['price'] }} </td>
                    <td> {{ $row['psum'] }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('footer')
    <script src="assets/js/Header.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.fa.js"></script>
    <script src="assets/js/OrderGrid.js"></script>
@stop