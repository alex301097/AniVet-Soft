<?php

use Illuminate\Database\Seeder;

class CategoriaProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new \App\CategoriaProducto();
      $dato->descripcion = "Comida";
      $dato->save();

      $dato = new \App\CategoriaProducto();
      $dato->descripcion = "Accesorio";
      $dato->save();

      $dato = new \App\CategoriaProducto();
      $dato->descripcion = "Medicamento";
      $dato->save;

      $dato = new \App\CategoriaProducto();
      $dato->descripcion = "Cuidado";
      $dato->save();

      $dato = new \App\CategoriaProducto();
      $dato->descripcion = "Higiene";
      $dato->save();
    }
}
