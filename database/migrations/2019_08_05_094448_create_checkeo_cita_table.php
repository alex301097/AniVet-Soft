<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckeoCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkeo_cita', function (Blueprint $table) {
          $table->unsignedBigInteger('checkeo_id');
          $table->foreign('checkeo_id')->references('id')->on('checkeos');
          $table->unsignedBigInteger('cita_id');
          $table->foreign('cita_id')->references('id')->on('citas');
          $table->string('descripcion');
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
        Schema::dropIfExists('checkeo_cita');
    }
}
