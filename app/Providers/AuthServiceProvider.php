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

      Gate::define('proc-index',function($user){
          return $user->tieneAcceso(['proc_adopcion_masc-index','proc_citas-index','proc_expediente-index']);
      });

      //Usuarios
      Gate::define('mant_usuarios-index',function($user){
          return $user->tieneAcceso(['mant_usuarios-index']);
      });

      Gate::define('mant_usuarios-crear',function($user){
          return $user->tieneAcceso(['mant_usuarios-crear']);
      });

      Gate::define('mant_usuarios-detalle',function($user){
          return $user->tieneAcceso(['mant_usuarios-detalle']);
      });

      Gate::define('mant_usuarios-editar',function($user){
          return $user->tieneAcceso(['mant_usuarios-editar']);
      });

      Gate::define('mant_usuarios-eliminar',function($user){
          return $user->tieneAcceso(['mant_usuarios-eliminar']);
      });

      //Pacientes
      Gate::define('mant_pacientes-index',function($user){
          return $user->tieneAcceso(['mant_pacientes-index']);
      });

      Gate::define('mant_pacientes-crear',function($user){
          return $user->tieneAcceso(['mant_pacientes-crear']);
      });

      Gate::define('mant_pacientes-detalle',function($user){
          return $user->tieneAcceso(['mant_pacientes-detalle']);
      });

      Gate::define('mant_pacientes-editar',function($user){
          return $user->tieneAcceso(['mant_pacientes-editar']);
      });

      Gate::define('mant_pacientes-eliminar',function($user){
          return $user->tieneAcceso(['mant_pacientes-eliminar']);
      });

      Gate::define('mant_pacientes-imagenes',function($user){
          return $user->tieneAcceso(['mant_pacientes-imagenes']);
      });

      //Animales en venta
      Gate::define('mant_animales_en_venta-index',function($user){
          return $user->tieneAcceso(['mant_animales_en_venta-index']);
      });

      Gate::define('mant_animales_en_venta-crear',function($user){
          return $user->tieneAcceso(['mant_animales_en_venta-crear']);
      });

      Gate::define('mant_animales_en_venta-detalle',function($user){
          return $user->tieneAcceso(['mant_pacientes-detalle']);
      });

      Gate::define('mant_animales_en_venta-editar',function($user){
          return $user->tieneAcceso(['mant_animales_en_venta-editar']);
      });

      Gate::define('mant_animales_en_venta-eliminar',function($user){
          return $user->tieneAcceso(['mant_animales_en_venta-eliminar']);
      });

      Gate::define('mant_animales_en_venta-imagenes',function($user){
          return $user->tieneAcceso(['mant_animales_en_venta-imagenes']);
      });

      //Citas
      Gate::define('mant_citas-index',function($user){
          return $user->tieneAcceso(['mant_citas-index']);
      });

      Gate::define('mant_citas-crear',function($user){
          return $user->tieneAcceso(['mant_citas-crear']);
      });

      Gate::define('mant_citas-detalle',function($user){
          return $user->tieneAcceso(['mant_citas-detalle']);
      });

      Gate::define('mant_citas-editar',function($user){
          return $user->tieneAcceso(['mant_citas-editar']);
      });

      Gate::define('mant_citas-eliminar',function($user){
          return $user->tieneAcceso(['mant_citas-eliminar']);
      });

      //Roles
      Gate::define('mant_roles-index',function($user){
          return $user->tieneAcceso(['mant_roles-index']);
      });

      Gate::define('mant_roles-crear',function($user){
          return $user->tieneAcceso(['mant_roles-crear']);
      });

      Gate::define('mant_roles-asignar',function($user){
          return $user->tieneAcceso(['mant_roles-asignar']);
      });

      Gate::define('mant_roles-detalle',function($user){
          return $user->tieneAcceso(['mant_roles-detalle']);
      });

      Gate::define('mant_roles-editar',function($user){
          return $user->tieneAcceso(['mant_roles-editar']);
      });

      Gate::define('mant_roles-eliminar',function($user){
          return $user->tieneAcceso(['mant_roles-eliminar']);
      });

      //Tipos de servicios
      Gate::define('mant_tipos_servicios-index',function($user){
          return $user->tieneAcceso(['mant_tipos_servicios-index']);
      });

      Gate::define('mant_tipos_servicios-crear',function($user){
          return $user->tieneAcceso(['mant_tipos_servicios-crear']);
      });

      Gate::define('mant_tipos_servicios-detalle',function($user){
          return $user->tieneAcceso(['mant_tipos_servicios-detalle']);
      });

      Gate::define('mant_tipos_servicios-editar',function($user){
          return $user->tieneAcceso(['mant_tipos_servicios-editar']);
      });

      Gate::define('mant_tipos_servicios-eliminar',function($user){
          return $user->tieneAcceso(['mant_tipos_servicios-eliminar']);
      });

      //Tipos de animales
      Gate::define('mant_tipos_animales-index',function($user){
          return $user->tieneAcceso(['mant_tipos_animales-index']);
      });

      Gate::define('mant_tipos_animales-crear',function($user){
          return $user->tieneAcceso(['mant_tipos_animales-crear']);
      });

      Gate::define('mant_tipos_animales-detalle',function($user){
          return $user->tieneAcceso(['mant_tipos_animales-detalle']);
      });

      Gate::define('mant_tipos_animales-editar',function($user){
          return $user->tieneAcceso(['mant_tipos_animales-editar']);
      });

      Gate::define('mant_tipos_animales-eliminar',function($user){
          return $user->tieneAcceso(['mant_tipos_animales-eliminar']);
      });
    }
}
