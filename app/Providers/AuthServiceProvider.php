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

      //Proceso de registro de adopcion de animales
      Gate::define('pro_registro_adopcion-index',function($user){
          return $user->tieneAcceso(['pro_registro_adopcion-index']);
      });

      Gate::define('pro_registro_adopcion-Añadir',function($user){
          return $user->tieneAcceso(['pro_registro_adopcion-Añadir']);
      });

      Gate::define('pro_registro_adopcion-Finalizar',function($user){
          return $user->tieneAcceso(['pro_registro_adopcion-Finalizar']);
      });

      Gate::define('pro_registro_adopcion-Eliminar_Grupal',function($user){
          return $user->tieneAcceso(['pro_registro_adopcion-Eliminar_Grupal']);
      });

      Gate::define('pro_registro_adopcion-Eliminar_Individual',function($user){
          return $user->tieneAcceso(['pro_registro_adopcion-Eliminar_Individual']);
      });

      //Proceso del expediente digital
      Gate::define('pro_expediente-index',function($user){
          return $user->tieneAcceso(['pro_expediente-index']);
      });

      Gate::define('pro_expediente-Añadir_Resultados',function($user){
          return $user->tieneAcceso(['pro_expediente-Añadir_Resultados']);
      });

      Gate::define('pro_expediente-Añadir_Chequeos',function($user){
          return $user->tieneAcceso(['pro_expediente-Añadir_Chequeos']);
      });

      Gate::define('pro_expediente-Modificar',function($user){
          return $user->tieneAcceso(['pro_expediente-Modificar']);
      });

      Gate::define('pro_expediente-Eliminar',function($user){
          return $user->tieneAcceso(['pro_expediente-Eliminar']);
      });

      //Proceso de calendarizacion de citas
      Gate::define('pro_calendarizacion-index',function($user){
          return $user->tieneAcceso(['pro_calendarizacion-index']);
      });

      Gate::define('pro_calendarizacion-Añadir',function($user){
          return $user->tieneAcceso(['pro_calendarizacion-Añadir']);
      });

      Gate::define('pro_calendarizacion-Modificar',function($user){
          return $user->tieneAcceso(['pro_calendarizacion-Modificar']);
      });

      Gate::define('pro_calendarizacion-Eliminar',function($user){
          return $user->tieneAcceso(['pro_calendarizacion-Eliminar']);
      });

      //Proceso de solicitud de Adopcion de animales
      Gate::define('pro_solicitud_adopcion-index',function($user){
          return $user->tieneAcceso(['pro_solicitud_adopcion-index']);
      });

      Gate::define('pro_solicitud_adopcion-Añadir',function($user){
          return $user->tieneAcceso(['pro_solicitud_adopcion-Añadir']);
      });

      Gate::define('pro_solicitud_adopcion-Finalizar',function($user){
          return $user->tieneAcceso(['pro_solicitud_adopcion-Finalizar']);
      });

      Gate::define('pro_solicitud_adopcion-Eliminar_Grupal',function($user){
          return $user->tieneAcceso(['pro_solicitud_adopcion-Eliminar_Grupal']);
      });

      Gate::define('pro_solicitud_adopcion-Eliminar_Individual',function($user){
          return $user->tieneAcceso(['pro_solicitud_adopcion-Eliminar_Individual']);
      });

      //Proceso de venta de animales
      Gate::define('pro_venta_animales-index',function($user){
          return $user->tieneAcceso(['pro_venta_animales-index']);
      });

      Gate::define('pro_venta_animales-Añadir',function($user){
          return $user->tieneAcceso(['pro_venta_animales-Añadir']);
      });

      Gate::define('pro_venta_animales-Finalizar',function($user){
          return $user->tieneAcceso(['pro_venta_animales-Finalizar']);
      });

      Gate::define('pro_venta_animales-Eliminar_Grupal',function($user){
          return $user->tieneAcceso(['pro_venta_animales-Eliminar_Grupal']);
      });

      Gate::define('pro_venta_animales-Eliminar_Individual',function($user){
          return $user->tieneAcceso(['pro_venta_animales-Eliminar_Individual']);
      });

      //Reporte de Usuarios
      Gate::define('rep_reporte_usuarios-index',function($user){
          return $user->tieneAcceso(['rep_reporte_usuarios-index']);
      });

      Gate::define('rep_reporte_usuarios-Generar',function($user){
          return $user->tieneAcceso(['rep_reporte_usuarios-Generar']);
      });

        //Reporte de Pacientes
        Gate::define('rep_reporte_pacientes-index',function($user){
            return $user->tieneAcceso(['rep_reporte_pacientes-index']);
        });

        Gate::define('rep_reporte_pacientes-Generar',function($user){
            return $user->tieneAcceso(['rep_reporte_pacientes-Generar']);
        });

        //Reporte de Citas
        Gate::define('rep_reporte_citas-index',function($user){
            return $user->tieneAcceso(['rep_reporte_citas-index']);
        });

        Gate::define('rep_reporte_citas-Generar',function($user){
            return $user->tieneAcceso(['rep_reporte_citas-Generar']);
        });

        //Reporte de Citas
        Gate::define('rep_reporte_expediente_medico-index',function($user){
            return $user->tieneAcceso(['rep_reporte_citas-index']);
        });

        Gate::define('rep_reporte_expediente_medico-Generar',function($user){
            return $user->tieneAcceso(['rep_reporte_expediente_medico-Generar']);
        });
        //Respaldos
        Gate::define('seg_respaldos-index',function($user){
            return $user->tieneAcceso(['seg_respaldos-index']);
        });

        Gate::define('seg_respaldos-Añadir',function($user){
            return $user->tieneAcceso(['seg_respaldos-Añadir']);
        });

        Gate::define('seg_respaldos-Restaurar',function($user){
            return $user->tieneAcceso(['seg_respaldos-Restaurar']);
        });

        Gate::define('seg_respaldos-Eliminar',function($user){
            return $user->tieneAcceso(['seg_respaldos-Eliminar']);
        });

        Gate::define('seg_respaldos-descargar',function($user){
            return $user->tieneAcceso(['seg_respaldos-descargar']);
        });
    }
}
