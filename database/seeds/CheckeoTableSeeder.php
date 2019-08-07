<?php

use Illuminate\Database\Seeder;

class CheckeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new \App\Checkeo();
      $dato->descripcion = "Condición General";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Llenado capilar";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Mucosas";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Reproductor";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Digestivo";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Nervioso";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Ganglios linfáticos";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Dietas";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Piel";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Respiratorio";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Cardiaco";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Urinario";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Ojos";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Oidos";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Temperatura";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Peso";
      $dato->save();

      $dato = new \App\Checkeo();
      $dato->descripcion = "Hidratación";
      $dato->save();
    }
}
