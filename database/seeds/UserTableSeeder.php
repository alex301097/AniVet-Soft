<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ///Admin
      $user = new \App\User();
      $user->cedula = "1-0234-0567";
      $user->nombre = "Admin1";
      $user->apellidos = "Admin1";
      $user->nacionalidad = "Costa Rica";
      $user->fecha_nacimiento = "1990-04-08";
      // $edad = Carbon::parse($user->fecha_nacimiento)->age;
      //$user->edad = $edad;
      $user->sexo = "Masculino";
      $user->estado_civil = "Soltero(a)";
      $user->direccion = "Villa Elia, Río Segundo de Alajuela";
      $user->telefono = "87677126";
      $user->email = "admin1@gmail.com";
      $user->codigo = "alox124";
      $user->password = Hash::make("admin1234");
      $user->rol()->associate(1);
      $user->save();
    }
}
