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
Route::get('getaddeduser','Main@addedUserDetail');
Route::get('logout','Logout@index');
Route::get('checkmail','Home@checkMail');
