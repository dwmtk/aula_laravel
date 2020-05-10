<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t__orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('user_id', 4);
            $table->string('mycar_id', 4);
            $table->string('parking_id', 4);
            $table->string('status',1);
            $table->string('schedule',1);
            $table->string('order_date',16);
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
        Schema::dropIfExists('t__orders');
    }
}
