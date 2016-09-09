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
    Addeduserdetail   
@stop
@section('headsection')
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css">
@stop
@section('body')
    @include('partials.Header')
   
    @if(count($result)!=0)
        <table id="grid-data" class="table table-condensed table-hover table-striped">
            <thead>
                <tr>
                    <th data-column-id="Name" data-type="numeric">Name</th>
                    <th data-column-id="mail">Email-id</th>
                    <th data-column-id="mobile" data-order="desc">Contact-No.</th>
                </tr>
            </thead>
                
            <tbody>
                @foreach($result as $record)
                    <tr>
                        <td>{{$record['name'] }}</td>
                        <td>{!!$record['mail'] !!}</td>
                        <td>{!!$record['mobile'] !!}</td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <h3>No Record Found </h3>
    @endif
@stop

@section('footer')
    <script src="assets/js/Header.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.fa.js"></script>
    
    
    
    <script src="assets/js/BootScript.js"></script>
@stop