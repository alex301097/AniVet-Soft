<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_solicituds', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('enc_solicitud_id');
          $table->foreign('enc_solicitud_id')->references('id')->on('enc_solicituds');
          $table->unsignedBigInteger('det_adopcion_id');
          $table->foreign('det_adopcion_id')->references('id')->on('det_adopcions');
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
        Schema::dropIfExists('det_solicituds');
    }
}
