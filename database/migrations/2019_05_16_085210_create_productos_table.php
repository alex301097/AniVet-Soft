<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codigo');
          $table->string('nombre');
          $table->string('proveedor');
          $table->string('costo_prov');
          $table->string('precio_unit');
          $table->string('cant_existencia');
          $table->integer('categoria_producto_id')->unsigned();
          $table->foreign('categoria_producto_id')->references('id')->on('categoria_productos');
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
        Schema::dropIfExists('productos');
    }
}
