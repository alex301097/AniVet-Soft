<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Rol administrador
    $rol = new \App\Rol();
    $rol->descripcion = 'Administrador';
    $rol->permissions = json_encode([
      'mantenimientos' => true,
      'venta_productos' => true,
      'inventario' => true,
      'calendarizacion' => true,
      'adopcion' => true,
    ]);
    $rol->save();
    }
}
