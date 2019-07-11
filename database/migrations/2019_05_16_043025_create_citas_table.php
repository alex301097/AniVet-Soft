<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha');
            $table->string('horaInicio');
            $table->string('horaFinal');
            $table->string('motivo');
            $table->string('observaciones');
            $table->integer('tipo_servicio_id')->unsigned();
            $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicios');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->integer('user_create_id')->unsigned();
            $table->foreign('user_create_id')->references('id')->on('users');
            $table->string('coordinado');
            $table->string('estado');
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
        Schema::dropIfExists('citas');
    }
}
