<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailerVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailer_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trailer_vehicle_id')->nullable()->unsigned();
            $table->integer('adds_new_vehicles_id')->unsigned();


            $table->foreign('trailer_vehicle_id')->references('id')->on('trailers')->onDelete('cascade');
            $table->foreign('adds_new_vehicles_id')->references('id')->on('adds_new_vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trailer_vehicles');
    }
}
