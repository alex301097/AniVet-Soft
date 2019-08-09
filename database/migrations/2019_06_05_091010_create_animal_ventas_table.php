<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('edad');
            $table->string('peso');
            $table->string('raza');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo', 15)->nullable();
            $table->unsignedBigInteger('tipo_animal_id');
            $table->foreign('tipo_animal_id')->references('id')->on('tipo_animals');
            $table->integer('cantidad');
            $table->integer('precio');
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
        Schema::dropIfExists('animal_ventas');
    }
}
