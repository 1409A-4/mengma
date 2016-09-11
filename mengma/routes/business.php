<?php
    /*
     *商户模块
     */
Route::get('business/login', 'Business\LoginController@businessLogin');                  //商户登录
Route::post('business/login_pro', 'Business\LoginController@businessLogin_pro');        //商户登录验证
Route::post('business/add', 'Business\LoginController@businessAdd');                                 //商户入驻
Route::group(['prefix' => 'business','middleware'=>'business'],function () {

        Route::get('logout', 'Business\LoginController@businessLogout');                //商户退出
        Route::get('home', 'Business\IndexController@businessHome');                    //商户大厅
        Route::get('info', 'Business\IndexController@businessInfo');                    //商户信息
        Route::get('openEmail', 'Business\IndexController@businessEmail');              //邮箱激活
        Route::post('checkCode', 'Business\IndexController@businessCode');              //验证码验证
        Route::get('goodsAdd', 'Business\GoodsController@goodsAdd');                     //商品添加
        Route::post('goodsAdd_pro', 'Business\GoodsController@goodsAdd_pro');            //执行商品添加
        Route::get('goodsList', 'Business\GoodsController@goodsList');                    //商品列表
        Route::get('goodsDel', 'Business\GoodsController@goodsDel');                       //商品删除
        Route::get('goodsUpd', 'Business\GoodsController@goodsUpd');                       //商品编辑
        Route::post('goodsUpd', 'Business\GoodsController@goodsUpd');                       //商品编辑

});




