<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfterAttendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_attends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requestcustomer_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->integer('driver_id')->nullable()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('attend_description')->nullable();
            $table->timestamps();

            $table->foreign('requestcustomer_id')
            ->references('id')->on('request_customers')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('vehicle_id')
            ->references('id')->on('adds_new_vehicles')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('driver_id')
            ->references('id')->on('adds_new_drivers')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('after_attends');
    }
}
