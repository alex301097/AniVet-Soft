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

        //Rol gerente
        $rol = new \App\Rol();
        $rol->descripcion = 'Gerente';
        $rol->permissions = json_encode([
          'mantenimientos' => true,
          'venta_productos' => true,
          'inventario' => true,
          'calendarizacion' => true,
          'adopcion' => true,
        ]);
        $rol->save();

        //Rol empleado
        $rol = new \App\Rol();
        $rol->descripcion = 'Empleado';
        $rol->permissions = json_encode([
          'venta_productos' => true,
          'adopcion' => true,
        ]);
        $rol->save();

        //Rol veterinario
        $rol = new \App\Rol();
        $rol->descripcion = 'Veterinario';
        $rol->permissions = json_encode([
          'calendarizacion' => true,
          'adopcion' => true,
        ]);
        $rol->save();

        //Rol cliente
        $rol = new \App\Rol();
        $rol->descripcion = 'Cliente';
        $rol->permissions = '';
        $rol->save();

    }
}
