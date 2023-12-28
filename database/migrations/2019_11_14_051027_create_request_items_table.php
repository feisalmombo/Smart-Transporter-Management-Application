<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_description');
            $table->string('weight');
            $table->string('number_of_packages');
            $table->integer('truck_id')->unsigned();
            $table->integer('requestcustomer_id')->unsigned();
            $table->string('origin_point');
            $table->string('destination_point');
            $table->integer('container_id')->unsigned();
            $table->string('trip_duration');
            $table->string('attachments_path');
            $table->text('details_requests')->nullable();
            $table->timestamps();

            $table->foreign('truck_id')
            ->references('id')->on('trucktypes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('container_id')
            ->references('id')->on('containers')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('requestcustomer_id')
            ->references('id')->on('request_customers')
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
        Schema::dropIfExists('request_items');
    }
}
