<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('adds_new_drivers_id')->unsigned();
            $table->integer('adds_new_vehicles_id')->unsigned();


            $table->foreign('adds_new_drivers_id')->references('id')->on('adds_new_drivers')->onDelete('cascade');
            $table->foreign('adds_new_vehicles_id')->references('id')->on('adds_new_vehicles')->onDelete('cascade');

            //$table->primary(['adds_new_drivers_id','adds_new_vehicles_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_vehicles');
    }
}
