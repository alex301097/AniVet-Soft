<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetAdopcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_adopcions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('enc_adopcion_id');
          $table->foreign('enc_adopcion_id')->references('id')->on('enc_adopcions');
          $table->string('nombre')->nullable();
          $table->string('edad');
          $table->string('peso');
          $table->string('raza');
          $table->string('color');
          $table->string('sexo', 15)->nullable();
          $table->string('tipo_animal');
          $table->integer('cantidad')->nullable();
          $table->string('imagen');
          $table->string('observaciones');
          $table->string('condiciones');
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
        Schema::dropIfExists('det_adopcion');
    }
}
