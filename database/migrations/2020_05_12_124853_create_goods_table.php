<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_good', function (Blueprint $table) {
            $table->bigIncrements('good_id');
            $table->string('good_id_no',10)->unique();
            $table->string('truck_id');
            $table->string('driver_id');
            $table->string('good_type');
            $table->string('good_weight');
            $table->string('good_cost');
            $table->string('diesel_cost');
            $table->string('commission');
            $table->string('road_expenses');
            $table->string('client_id');
            $table->date('good_date_of_pickup');
            $table->date('good_date_of_delivery')->nullable();
            $table->string('good_pickup_point');
            $table->string('good_delivery_point');
            $table->string('payment_status')->default('0');
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
        Schema::dropIfExists('tbl_good');
    }
}
