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

Auth::loginUsingId(1);

//Route::get('/', function () {
//    $user = Auth::user();
//    return view('cart',compact('user'));
//});

Route::resource('/', 'CashierController');

