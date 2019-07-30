<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncAdopcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enc_adopcions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('cedula_dueño');
          $table->string('nombre_dueño');
          $table->string('apellidos_dueño');
          $table->string('direccion_dueño');
          $table->string('telefono_dueño');
          $table->string('correo_dueño');
          $table->string('sexo_dueño', 15);
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
        Schema::dropIfExists('enc_adopcion');
    }
}
