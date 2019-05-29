<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdopcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopcions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('edad');
            $table->string('peso');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo', 15)->nullable();
            $table->string('observaciones');
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
        Schema::dropIfExists('adopcions');
    }
}
