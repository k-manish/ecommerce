<?php
/**
* File Name :Registration.blade.php
* File Path :view/pages/partials
* Author :Manish Kumar
* Date of creation :08/09/2016
* Comments if any :
*
*/
?>
<div class="container primediv">
    <h2>Fill Following Detail</h2>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>                        
            @endforeach
        </ul>
    @endif
    <h5 id="error"></h5>
    <form action={{url('/')}}/useraddition>
        <div class="form-group">
            <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">Name:-</label>
            <input type="text" class="form-control com-sm-2 com-md-2 com-lg-2" id="name" name="name"autofocus>
        </div>
        <div class="form-group">
            <label for="Email" class="control-level col-sm-2 com-md-2 com-lg-2">Email-id:-</label>
            <input type="email" class="form-control com-sm-2 com-md-2 com-lg-2" id="mail" name="mail"
                    onfocusout="checkMail()" >
        </div>
        <div class="form-group">
            <label for="name" class="control-level col-sm-2 com-md-2 com-lg-2">Contect-No:-</label>
            <input type="text" name="mobile" class="form-control com-sm-2 com-md-2 com-lg-2"
                    id="mobile" placeholder="enter mobile number">
         </div>
        <div class="form-group">
            <label for="Password" class="control-level col-sm-2 com-md-2 com-lg-2">Password:-</label>
            <input type="password" class="form-control com-sm-2 com-md-2 com-lg-2"
                     id="pswd" name="pswd" placeholder="enter new password">
        </div>
        <div class="form-group">
            <label for="Password" class="control-level col-sm-2 com-md-2 com-lg-2">Confirm-Password:-</label>
            <input type="password" class="form-control com-sm-2 com-md-2 com-lg-2"
                    id="c_pswd" name="c_pswd" placeholder="re-enter your password">
        </div>
                
        <div class="form-group">
            <input type="submit" class="form-control com-sm-2 com-md-2 com-lg-2" id="btn_sub">
        </div>
    </form>
</div>
    
<script src="assets/js/Registration.js"></script>