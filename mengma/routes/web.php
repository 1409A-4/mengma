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
Route::get('scenicSpot','Index\IndexController@scenicSpot');//��������
Route::get('hotel','Index\IndexController@hotel');//�Ƶ�
Route::get('hotelCar','Index\IndexController@hotelCar');//��·
Route::get('hotelCarin','Index\IndexController@hotelCarin');//��·����

