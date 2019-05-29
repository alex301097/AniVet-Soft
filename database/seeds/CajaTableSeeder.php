<?php

use Illuminate\Database\Seeder;

class CajaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new \App\Caja();
      $dato->descripcion = "Caja #1";
      $dato->save();

      $dato = new \App\Caja();
      $dato->descripcion = "Caja #2";
      $dato->save();
    }
}
