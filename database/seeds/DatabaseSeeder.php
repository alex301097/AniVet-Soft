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
      $this->call(RolTableSeeder::class);
      $this->call(UserTableSeeder::class);
      $this->call(CategoriaProductoTableSeeder::class);
      $this->call(CajaTableSeeder::class);
      $this->call(TipoAnimalTableSeeder::class);
      $this->call(TipoPagoFacturaTableSeeder::class);
      $this->call(TipoServicioTableSeeder::class);
      $this->call(TipoAtencionTableSeeder::class);
    }
}
