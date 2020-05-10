<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMycarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t__mycars', function (Blueprint $table) {
            $table->bigIncrements('mycar_id');
            $table->string('user_id', 4);
            $table->string('car_maker', 20);
            $table->string('car_name', 25);
            $table->string('car_age_start',8);
            $table->string('car_age_end',8)->nullable();
            $table->integer('car_length');
            $table->integer('car_height');
            $table->integer('car_width');
            $table->string('car_number',5);
            $table->string('car_color',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t__mycars');
    }
}
