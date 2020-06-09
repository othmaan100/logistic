<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_drivers', function (Blueprint $table) {
            $table->bigIncrements('driver_id');
            $table->string('driver_id_no',10)->unique();
            $table->string('driver_name');
            $table->string('driver_phone',11);
            $table->text('driver_address')->nullable();
            $table->string('driver_image');
            
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
        Schema::dropIfExists('tbl_drivers');
    }
}
