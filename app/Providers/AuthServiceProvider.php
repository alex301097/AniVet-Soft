<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
      $this->registerPolicies();

      Gate::define('mantenimientos',function($user){
          return $user->tieneAcceso(['mant-usuarios']);
      });
      Gate::define('venta_productos',function($user){
          return $user->tieneAcceso(['mant-pacientes']);
      });
      Gate::define('inventario',function($user){
          return $user->tieneAcceso(['inventario']);
      });
      Gate::define('calendarizacion',function($user){
          return $user->tieneAcceso(['calendarizacion']);
      });
      Gate::define('adopcion',function($user){
          return $user->tieneAcceso(['adopcion']);
      });
      Gate::define('admin',function($user){
          return $user->tieneRol('Administrador');
      });
    }
}
