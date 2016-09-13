<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/6
 * Time: 9:57
 */
Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/login', 'Admin\LoginCoontroller@loadLogin');//登录路由
Route::post('admin/checkLogin', 'Admin\LoginCoontroller@checkLogin');//验证登录
Route::get('admin/verify/{rand}', 'Admin\LoginCoontroller@verify');//验证码

Route::group(['prefix' => 'admin','middleware'=>'login'],function () {
    Route::get('index', 'Admin\IndexController@index');//首页
    Route::get('logout', 'Admin\LoginCoontroller@logout');//退出登录
    Route::post('setPwd', 'Admin\LoginCoontroller@setPwd');//修改密码

    Route::get('loadUserAdd', 'Admin\UserController@loadUserAdd');//加载用户添加
    Route::post('userAdd', 'Admin\UserController@userAdd');//用户添加
    Route::get('userShow', 'Admin\UserController@userShow');//用户管理
    Route::get('userEdit', 'Admin\UserController@userEdit');//用户禁用

    Route::get('loadClassifyAdd', 'Admin\ClassifyController@loadClassifyAdd');//加载分类添加
    Route::post('classifyAdd', 'Admin\ClassifyController@classifyAdd');//分类添加
    Route::get('classifyShow', 'Admin\ClassifyController@classifyShow');//分类管理
    Route::get('loadClassifyEdit', 'Admin\ClassifyController@loadClassifyEdit');//加载分类编辑
    Route::post('classifyEdit', 'Admin\ClassifyController@classifyEdit');//分类编辑
    Route::get('classifyDel', 'Admin\ClassifyController@classifyDel');//分类删除

    Route::get('loadGoodsAdd', 'Admin\GoodsController@loadGoodsAdd');//加载商品添加
    Route::post('goodsAdd', 'Admin\GoodsController@goodsAdd');//商品添加
    Route::get('goodsShow', 'Admin\GoodsController@goodsShow');//商品管理
    Route::get('loadGoodsEdit', 'Admin\GoodsController@loadGoodsEdit');//加载商品编辑
    Route::post('goodsEdit', 'Admin\GoodsController@goodsEdit');//商品编辑
    Route::get('goodsDel', 'Admin\GoodsController@goodsDel');//商品删除
    Route::get('loadGoodsImg', 'Admin\GoodsController@loadGoodsImg');//加载商品图片
    Route::post('addGoodsImg', 'Admin\GoodsController@addGoodsImg');//商品图片添加
    Route::get('delGoodsImg', 'Admin\GoodsController@delGoodsImg');//商品图片修改

    Route::get('loadManagerAdd', 'Admin\ManagerController@loadManagerAdd');//加载管理员添加
    Route::post('managerAdd', 'Admin\ManagerController@managerAdd');//管理员添加
    Route::get('managerShow', 'Admin\ManagerController@managerShow');//管理员管理
    Route::get('loadManagerEdit', 'Admin\ManagerController@loadManagerEdit');//加载管理员编辑
    Route::post('managerEdit', 'Admin\ManagerController@managerEdit');//管理员编辑
    Route::get('managerDel', 'Admin\ManagerController@managerDel');//管理员删除

    Route::get('loadRoleAssign', 'Admin\RoleController@loadRoleAssign');//加载分配角色
    Route::post('roleAssign', 'Admin\RoleController@roleAssign');//分配角色
    Route::get('adminRole', 'Admin\RoleController@adminRole');//查找当前用户角色
    Route::resource('role', 'Admin\RoleController');//角色路由

    Route::get('loadPowerAssign', 'Admin\PowerController@loadPowerAssign');//加载分配权限
    Route::post('powerAssign', 'Admin\PowerController@powerAssign');//分配权限
    Route::get('rolePower', 'Admin\PowerController@rolePower');//查找当前角色权限
    Route::resource('power', 'Admin\PowerController');//权限路由

});
