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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',['as'=>'trang-chu','uses'=>'PageController@getIndex']);

Route::get('loaisanpham/{type}',['as'=>'loaisanpham','uses'=>'PageController@getLoaisanpham']);

Route::get('chitietsanpham/{id}',['as'=>'chitietsanpham','uses'=>'PageController@getChitietsanpham']);

Route::get('contact',['as'=>'contact','uses'=>'PageController@getContact']);

Route::get('about',['as'=>'about','uses'=>'PageController@getAbout']);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtocart'
]);

Route::get('xoasanpham/{id}',[
'as'=>'xoasanpham','uses'=>'PageController@deleteProduct']);

Route::get('checkout','PageController@checkout')->name('checkout');

// Route::get('valideCheckout',)