<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m__calendars', function (Blueprint $table) {
            $table->string('calendar',8)->primary('calendar');
            $table->integer('schedule1')->length(2);
            $table->integer('schedule2')->length(2);
            $table->integer('schedule3')->length(2);
            $table->integer('schedule4')->length(2);
            $table->integer('schedule1_max')->length(2);
            $table->integer('schedule2_max')->length(2);
            $table->integer('schedule3_max')->length(2);
            $table->integer('schedule4_max')->length(2);
            $table->string('working_day',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m__calendars');
    }
}
