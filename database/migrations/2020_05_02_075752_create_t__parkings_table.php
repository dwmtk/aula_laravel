<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t__parkings', function (Blueprint $table) {
            $table->string('parking_id',4);
            $table->string('parking_postcode',7);
            $table->string('parking_prefecture',4);
            $table->string('parking_city',50);
            $table->string('parking_address',50);
            $table->string('parking_building',255)->nullable();;
            $table->string('user_id',4);
            $table->timestamps();

            $table->primary('parking_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t__parkings');
    }
}
