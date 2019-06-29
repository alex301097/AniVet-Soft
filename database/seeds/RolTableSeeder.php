<?php

use Illuminate\Database\Seeder;
use App\Permiso;

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
        $rol->save();
        $rol->permisos()->sync(Permiso::all());

        //Rol gerente
        $rol = new \App\Rol();
        $rol->descripcion = 'Gerente';
        $rol->save();

        //Rol veterinario
        $rol = new \App\Rol();
        $rol->descripcion = 'Veterinario';
        $rol->save();

        //Rol cliente
        $rol = new \App\Rol();
        $rol->descripcion = 'Cliente';
        $rol->save();

    }
}
