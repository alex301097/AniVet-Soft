<?php

use Illuminate\Database\Seeder;

class TipoServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new \App\TipoServicio();
      $dato->descripcion = "Corte de cabello";
      $dato->save();

      $dato = new \App\TipoServicio();
      $dato->descripcion = "Corte de uñas";
      $dato->save();

      $dato = new \App\TipoServicio();
      $dato->descripcion = "Operación";
      $dato->save();
    }
}
