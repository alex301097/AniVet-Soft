<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('edad');
            $table->string('peso');
            $table->date('fecha_nacimiento')->nullable();;
            $table->string('sexo', 15)->nullable();
            $table->text('imagen')->nullable();
            $table->string('observaciones');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tipo_animal_id')->unsigned();
            $table->foreign('tipo_animal_id')->references('id')->on('tipo_animals');
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
        Schema::dropIfExists('pacientes');
    }
}
