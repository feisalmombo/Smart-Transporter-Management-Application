<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('truck_number');
            $table->string('trailer_number');
            $table->string('dengla_number')->nullable();
            $table->string('tonnage');
            $table->string('container_number')->nullable();
            $table->string('driver_full_name');
            $table->string('driver_phone_number');
            $table->string('driver_licence_number');
            $table->string('driver_passport_number');
            $table->string('passport_attachment')->nullable();
            $table->string('licence_attachment')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trucks');
    }
}
