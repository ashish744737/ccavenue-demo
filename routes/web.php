<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/checkout','CheckoutController@checkout')->name('checkout');
Route::get('payment/success','CheckoutController@response');
Route::get('payment/cancel','CheckoutController@paymentcancel_page');