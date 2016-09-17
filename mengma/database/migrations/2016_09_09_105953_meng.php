<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meng extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        /*
        * 前台用户表
        * */
        Schema::create('user', function (Blueprint $table) {
            $table->increments('u_id');
            $table->string('u_name',12);            //名字
            $table->char('u_pwd',32);               //密码
            $table->string('u_email',26)->nullable();           //邮箱
            $table->string('u_phone',11)->nullable();            //手机
            $table->dateTime('u_btime');            //时间
            $table->dateTime('u_etime')->nullable();
            $table->char('u_ip',30);                //ip
            $table->string('u_oppid',30)->nullable();   
            $table->string('u_img',100);             //头像
            $table->string('u_uniq',32)->nullable();    //唯一标识
            $table->char('from',10)->nullable();              //来源
            $table->tinyInteger('u_status')->default(1);    //状态
            $table->timestamps();
        });
        /*
        * 后台管理员表
        * */
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('u_id');
            $table->string('u_name',12);
            $table->char('u_pwd',32);
            $table->string('u_email',26);
            $table->dateTime('u_btime');
            $table->dateTime('u_etime')->nullable();
            $table->char('u_ip',30);
            $table->string('u_img',50)->nullable();
            $table->tinyInteger('u_status')->default(1);
            $table->timestamps();
        });

        /*
        * 商家表
        * */
        Schema::create('business', function (Blueprint $table) {
            $table->increments('b_id');
            $table->string('b_name',30);
            $table->char('b_pwd',32);
            $table->string('b_email',26);
            $table->string('b_phone',11);
            $table->string('b_licence',100);
            $table->string('b_truename',30);
            $table->string('b_idcard',30);
            $table->string('b_address',30);
            $table->string('b_home',100);
            $table->string('b_describe',200);
            $table->dateTime('b_btime');
            $table->dateTime('b_etime')->nullable();
            $table->char('b_ip',30);
            $table->tinyInteger('b_status')->default(0);
            $table->timestamps();
        });

        /*
         * 酒店
         *
         * */
        Schema::create('hotel',function(Blueprint $table){
            $table->increments('h_id');
            $table->string('h_name',30);
            $table->integer('ht_id')->nullable();
            $table->string('h_price',30);
            $table->string('h_place',30);
            $table->dateTime('h_btime');
            $table->dateTime('h_etime');
            $table->integer('h_status')->nullable();
            $table->integer('h_stock')->nullable();
            $table->integer('b_id')->nullable();
        });
        /*
         *  酒店类型
         * */
        Schema::create('hotel_type',function(Blueprint $table){
             $table->increments('ht_id');
             $table->string('ht_name',12);
        });

        /*
         * 导航表
         * */
        Schema::create('navigation', function (Blueprint $table) {
            $table->increments('n_id');
            $table->string('n_name',12);
            $table->dateTime('n_btime');
            $table->integer('n_sort');
            $table->integer('p_id');
            $table->timestamps();
        });

        /*
          * 用户角色表
          * */
        Schema::create('admin_role', function (Blueprint $table) {
            $table->increments('ar_id');
            $table->integer('u_id');
            $table->integer('r_id');

        });

        /*
         * 角色表
         * */
        Schema::create('role', function (Blueprint $table) {
            $table->increments('r_id');
            $table->string('r_name',12);
            $table->dateTime('r_btime');

        });

        /*
         * 权限表
         * */
        Schema::create('power', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_name',30);
            $table->string('routename',30);
            $table->dateTime('p_btime');

        });
        /*
         * 角色权限表
         * */
        Schema::create('role_power', function (Blueprint $table) {
            $table->increments('rp_id');
            $table->integer('r_id');
            $table->integer('p_id');

        });

        /*
         * 商品表
         * */
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('g_id');
            $table->bigInteger('b_id');
            $table->char('g_name',30);
            $table->integer('g_price');
            $table->string('g_address',20);
            $table->string('g_home',100);
            $table->dateTime('g_btime');
            $table->dateTime('g_etime')->nullable();
            $table->tinyInteger('g_status')->default(0);
            $table->integer('g_stock');
            $table->integer('g_visit')->default(0);
            $table->integer('g_sell')->default(0);
            $table->integer('n_id');
            $table->timestamps();
        });
        /*
         * 商品图片表
         * */
        Schema::create('goodsimg', function (Blueprint $table) {
            $table->increments('i_id');
            $table->integer('g_id');
            $table->string('g_img',100);
            $table->timestamps();
        });

        /*
         *  航班
         * */
        Schema::create('flight', function (Blueprint $table) {
            $table->increments('f_id');
            $table->string('f_bplace',20);    //出发地
            $table->string('f_eplace',20);    //目的地
            $table->dateTime('f_btime');   //出发时间
            $table->dateTime('f_etime');   //返航时间
            $table->integer('s_id');     //舱位
            $table->timestamps();
        });
        /*
         *  舱位等级
         * */
        Schema::create('segment', function (Blueprint $table) {
            $table->increments('s_id');
            $table->string('s_name',100);   //舱位名称
            $table->string('s_price',100);  //价格

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('user');
        Schema::drop('admin');
        Schema::drop('business');
        Schema::drop('hotel');
        Schema::drop('hotel_type');
        Schema::drop('navigation');
        Schema::drop('admin_role');
        Schema::drop('role');
        Schema::drop('power');
        Schema::drop('role_power');
        Schema::drop('goods');
        Schema::drop('goodsimg');
        Schema::drop('flight');
        Schema::drop('segment');

    }
}
