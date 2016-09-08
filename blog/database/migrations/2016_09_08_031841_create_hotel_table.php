<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hotel', function (Blueprint $table) {
            $table->increments('h_id');
            $table->string('h_price',6);
            $table->string('h_name',30);
            $table->tinyInteger('hc_id');
            $table->string('h_place',50);
            $table->dateTime('h_btime');
            $table->dateTime('h_etime');
            $table->tinyInteger('h_status');
           
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
        Schema::drop('hotel');

    }
}
