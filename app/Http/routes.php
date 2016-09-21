<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redircet('ecommerce');
});

Route::get('ecommerce', 'Pub@index');
Route::get('Registration', 'Home@index');
Route::get('RegistrationValidate', 'Home@store');
Route::get('MainPage','Main@index');
Route::get('UserProfile','Main@userinfo');
Route::get('login','Login@index');
Route::get('useraddition','Main@addUser');
Route::resource('getaddeduser','Main@addedUserDetail');
Route::get('logout','Logout@index');
Route::get('checkmail','Home@checkMail');
Route::get('AddedUser','Main@addedUser');
Route::get('checkanyorder','Cart@index');
Route::get('updateinfo','Main@updateInfo');
Route::post('deluser','Main@delUser');
Route::get('addUser','Main@userAddition');
Route::get('userinfoedit', 'Main@editDetail');
Route::get('addproduct', 'Product@addProduct');
Route::get('ManageProduct', 'Product@adminProduct');
Route::post('uploadproduct', 'Product@uploadProduct');
Route::get('productdetail', 'Product@getAllProductDetail');
Route::get('addeduserprofile/{id}','Main@addedUserProfile');
Route::get('getproductdetail/{id}', 'Product@getdetail');
Route::get('editdetail/{id}','Main@getEditDetail');
Route::get('productdetail/{id}', 'Product@getThisProdDetail');
Route::post('placeorder','Order@placeOrder');
Route::post('adminProductDetail', 'Product@adminProductDetail');
Route::post('delproduct','Product@delProduct');
Route::get('showproductdetail/{id}','Product@showProductDetail');
Route::get('editproduct/{id}','Product@editProduct');
Route::post('updateproductinfo', 'Product@updateProductInfo');
Route::get('addToCart', 'Cart@addToCart');
Route::get('getUserOrderDetail', 'Order@getUserOrderDetail');
Route::get('cartdetail', 'Cart@cartDetail');
Route::get('removefromcart/{id}', 'Cart@removeFromCart');
