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
    return view('pages.Home');
});

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
Route::post('editdetail','Main@getEditDetail');
Route::get('userinfoedit','Main@editDetail');
