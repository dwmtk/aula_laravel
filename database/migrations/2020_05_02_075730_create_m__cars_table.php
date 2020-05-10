<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m__cars', function (Blueprint $table) {
            $table->string('car_maker', 20);
            $table->string('car_name', 25);
            $table->string('car_age_start', 8);
            $table->string('car_age_end', 8)->nullable();
            $table->integer('car_length');
            $table->integer('car_height');
            $table->integer('car_width');
            $table->string('del_flag',1);
            $table->timestamps();
            
            $table->primary(['car_maker', 'car_name','car_age_start']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m__cars');
    }
}
