<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
          $table->increments('id');
          $table->string('medicamentos');
          $table->string('observaciones');
          $table->integer('paciente_id')->unsigned();
          $table->foreign('paciente_id')->references('id')->on('pacientes');
          $table->integer('user_create_id')->unsigned();
          $table->foreign('user_create_id')->references('id')->on('users');
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
        Schema::dropIfExists('historials');
    }
}
