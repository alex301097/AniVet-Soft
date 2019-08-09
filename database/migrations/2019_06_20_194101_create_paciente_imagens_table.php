<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_imagens', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->text('imagen');
          $table->unsignedBigInteger('paciente_id');
          $table->foreign('paciente_id')->references('id')->on('pacientes');
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
        Schema::dropIfExists('paciente_imagens');
    }
}
