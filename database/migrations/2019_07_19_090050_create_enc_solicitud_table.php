<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enc_solicituds', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('cedula');
          $table->string('nombre');
          $table->string('apellidos');
          $table->string('direccion');
          $table->string('telefono');
          $table->string('correo');
          $table->string('sexo', 15);
          $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('enc_solicituds');
    }
}
