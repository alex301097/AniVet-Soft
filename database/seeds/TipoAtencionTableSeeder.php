<?php

use Illuminate\Database\Seeder;

class TipoAtencionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new \App\TipoAtencion();
      $dato->descripcion = "Consulta";
      $dato->save();

      $dato = new \App\TipoAtencion();
      $dato->descripcion = "Medicina General";
      $dato->save();

      $dato = new \App\TipoAtencion();
      $dato->descripcion = "Estetica";
      $dato->save();

      $dato = new \App\TipoAtencion();
      $dato->descripcion = "Emergencia";
      $dato->save();
    }
}
