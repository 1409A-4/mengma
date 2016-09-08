<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('train', function (Blueprint $table) {
            $table->increments('t_id');
            $table->increments('t_name');
            $table->dateTime('t_btime');
            $table->dateTime('t_etime');
            $table->char('t_bplace');
            $table->char('t_eplace');
            $table->decimal('t_price',10,2);
            $table->char('at_flight',30);
            $table->string('t_sum',5);
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
        Schema::drop('train');
    }
}
