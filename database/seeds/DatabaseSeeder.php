<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(PermisoTableSeeder::class);
      $this->call(RolTableSeeder::class);
      $this->call(UserTableSeeder::class);
      $this->call(TipoAnimalTableSeeder::class);
      $this->call(TipoServicioTableSeeder::class);
      $this->call(TipoAtencionTableSeeder::class);
      $this->call(CheckeoTableSeeder::class);
    }
}
