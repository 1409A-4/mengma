<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AirTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('air_ticket', function (Blueprint $table) {

            $table->increments('at_id');
            $table->increments('at_name');
            $table->dateTime('at_btime');
            $table->dateTime('at_etime');
            $table->char('at_bplace');
            $table->char('at_eplace');
            $table->decimal('at_price',10,2);
            $table->char('at_flight',30);
            $table->string('at_sum',5);

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
        Schema::drop('air_ticket');
    }
}
