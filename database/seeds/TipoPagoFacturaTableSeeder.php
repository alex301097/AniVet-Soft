<?php

use Illuminate\Database\Seeder;

class TipoPagoFacturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new \App\TipoPagoFactura();
      $dato->descripcion = "Efectivo";
      $dato->save();

      $dato = new \App\TipoPagoFactura();
      $dato->descripcion = "Tarjeta";
      $dato->save();
    }
}
