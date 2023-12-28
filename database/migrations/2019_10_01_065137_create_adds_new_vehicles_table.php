<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddsNewVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adds_new_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plate_horse_number')->nullable();
            $table->boolean('semi_trailer')->default(false)->nullable();
            $table->string('attachments_path');
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
        Schema::dropIfExists('adds_new_vehicles');
    }
}
