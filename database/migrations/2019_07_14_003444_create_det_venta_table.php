<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_ventas', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('enc_venta_id');
          $table->foreign('enc_venta_id')->references('id')->on('enc_ventas');
          $table->unsignedBigInteger('animal_venta_id');
          $table->foreign('animal_venta_id')->references('id')->on('animal_ventas');
          $table->softDeletes();
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
        Schema::dropIfExists('det_venta');
    }
}
