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
    $data=\App\Model\Business\Goods::get();
    foreach($data as $k=>$v){
        $gimg=\App\Model\Admin\GoodsImg::where('gid',$v->gid)->first();
        $data[$k]->gimg=$gimg->gimg;
    }
    $arr=\App\Model\Business\Goods::limit(3)->get();
    foreach($arr as $k=>$v){
        $gimg=\App\Model\Admin\GoodsImg::where('gid',$v->gid)->first();
        $arr[$k]->gimg=$gimg->gimg;
    }
    return view('welcome',['data'=>$data,'arr'=>$arr]);
});

Route::get('scenicSpot','Index\IndexController@scenicSpot');//景区详情
Route::get('hotel','Index\IndexController@hotel');//酒店
Route::get('hotelCar','Index\IndexController@hotelCar');//线路
Route::get('hotelCarin','Index\IndexController@hotelCarin');//线路详情

