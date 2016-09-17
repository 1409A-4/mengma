<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('scenicSpot','Index\IndexController@scenicSpot');//景区详情
Route::get('hotel','Index\IndexController@hotel');//酒店
Route::get('search_hotel','Index\SearchController@search_hotel');//搜索酒店
Route::get('booking','Index\IndexController@booking');//票务
Route::post('search_flight','Index\SearchController@search_flight');//搜索航班
Route::get('details','Index\SearchController@details');//酒店详情
Route::post('hpayment','Index\PaymentController@hpayment');//酒店客户支付填写信息页
Route::post('imprest','Index\PaymentController@imprest');//酒店预支付

