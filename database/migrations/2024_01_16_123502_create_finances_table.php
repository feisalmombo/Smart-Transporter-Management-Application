<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tonnage');
            $table->string('invoice_number');
            $table->string('price_per_tonnage');
            $table->string('commodity_description');
            $table->string('advance_payment')->nullable();
            $table->string('balance_payment')->nullable();
            $table->string('waiting_charges')->nullable();
            $table->string('payment_received_from')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('pod_status')->nullable();
            $table->string('pod_attached_shared')->nullable();
            $table->string('invoice_attached_shared')->nullable();
            $table->string('attached_file_paid_customer')->nullable();
            $table->string('loading_place')->nullable();
            $table->string('status')->nullable();
            $table->string('arrived_date')->nullable();
            $table->string('loaded_date')->nullable();
            $table->string('dispatch_date')->nullable();
            $table->string('current_position')->nullable();
            $table->string('gprs_coordinate_point')->nullable();
            $table->string('destination')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('customer_id')->unsigned();
            $table->integer('truck_id')->unsigned();
            $table->integer('system_user_id')->unsigned();
            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('truck_id')->references('id')->on('trucks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('system_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}
