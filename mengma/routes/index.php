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


Route::group(['prefix'=>'login'],function() {
    Route::get('register', 'Index\LoginController@register');//注册
    Route::get('send', 'Index\LoginController@send');//注册时发验证码
    Route::post('regis', 'Index\LoginController@registration');//注册验证
    
    Route::get('login','Index\LoginController@index');//登录页面
    Route::any('verify/{rand}','Index\LoginController@Verify');//验证码
    Route::post('loginin','Index\LoginController@loginin');//登录验证
    Route::get('third','Index\LoginController@thirdlogin');//第三方登录
    Route::get('wei','Index\LoginController@weixin');//微信登录
    Route::post('regiswei','Index\LoginController@RegisWeixin');//微信注册
    Route::get('loginout','Index\LoginController@loginout');//退出

});


Route::group(['prefix'=>'index'],function(){
    Route::get('center','Index\MyController@Index');//用户中心
    Route::get('invite','Index\MyController@Invite');//邀请注册页面
    Route::post('invite_Check','Index\MyController@invite_Check');//处理邀请注册
    Route::get('resetpass','Index\MyController@resetPass');//修改密码
    Route::post('pass_Check','Index\MyController@pass_Check');//处理修改密码
});





