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
    $data=\App\Model\Index\Package::get();


    $arr=\App\Model\Index\Package::limit(3)->get();

    return view('welcome',['data'=>$data,'arr'=>$arr]);
});

Route::get('scenicSpot','Index\IndexController@scenicSpot');     //景区详情
Route::get('hotel','Index\IndexController@hotel');                 //酒店
Route::get('hotelCar','Index\IndexController@hotelCar');          //线路
Route::get('hotelCarin','Index\IndexController@hotelCarin');     //线路详情
Route::get('sendEmail','Index\LoginController@sendEmail');       //验证邮箱

Route::get('checkLogin','Index\IndexController@checkLogin');       //验证登录
/*
 *  判断是否登录 
 * 
 */

Route::group(['middleware'=>'indexLogin'],function(){
    Route::post('packagePro','Index\IndexController@packagePro');    //预定
    Route::post('packageBuy','Index\IndexController@packageBuy');    //支付
    
});



Route::post('hpayment','Index\PaymentController@hpayment');     //酒店客户支付填写信息页
Route::get('hpayment','Index\PaymentController@hpayment');     //酒店客户支付填写信息页
Route::post('imprest','Index\PaymentController@imprest');       //酒店预支付
Route::get('search_hotel','Index\SearchController@search_hotel');//搜索酒店
Route::get('details','Index\SearchController@details');//酒店详情
Route::get('paying','Index\PaymentController@paying');//酒店支付
Route::get(' mail','Index\PaymentController@mail');//支付成功  发送邮箱

Route::get('hauorders','Index\AlreadyController@hauorders');//用户已经下单
Route::get('horderds','Index\AlreadyController@horderds');//用户已下订单详情页


/*
*  城市玩乐
*/

 
    Route::get('play','Index\CityController@Index');   //城市玩乐首页
    Route::get('sou','Index\CityController@search');   //城市玩乐首页搜索
    Route::get('infor','Index\CityController@infor');   //城市玩乐详情
    Route::post('package','Index\CityController@package');   //城市玩乐预订

