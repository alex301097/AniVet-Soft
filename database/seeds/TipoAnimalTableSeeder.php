<?php

use Illuminate\Database\Seeder;

class TipoAnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new \App\TipoAnimal();
      $dato->descripcion = "Perro";
      $dato->save();

      $dato = new \App\TipoAnimal();
      $dato->descripcion = "Gato";
      $dato->save();

      $dato = new \App\TipoAnimal();
      $dato->descripcion = "Perico";
      $dato->save();
    }
}
