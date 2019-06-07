<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_imagens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('imagen');
            $table->unsignedBigInteger('animal_venta_id');
            $table->foreign('animal_venta_id')->references('id')->on('animal_ventas');
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
        Schema::dropIfExists('animal_imagens');
    }
}
