<?php

use Illuminate\Database\Seeder;

class PermisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Mantenimiento de usuarios
      $permiso = new \App\Permiso();
      $permiso->categoria = 'usuarios';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_usuarios-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'usuarios';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_usuarios-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'usuarios';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_usuarios-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'usuarios';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_usuarios-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'usuarios';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_usuarios-eliminar';
      $permiso->save();

      //Mantenimiento de pacientes
      $permiso = new \App\Permiso();
      $permiso->categoria = 'pacientes';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_pacientes-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'pacientes';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_pacientes-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'pacientes';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_pacientes-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'pacientes';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_pacientes-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'pacientes';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_pacientes-eliminar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'pacientes';
      $permiso->nombre = 'Imagenes';
      $permiso->descripcion = 'mant_pacientes-imagenes';
      $permiso->save();

      //Mantenimiento de roles
      $permiso = new \App\Permiso();
      $permiso->categoria = 'roles';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_roles-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'roles';
      $permiso->nombre = 'Asignar permisos';
      $permiso->descripcion = 'mant_roles-asignar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'roles';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_roles-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'roles';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_roles-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'roles';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_roles-eliminar';
      $permiso->save();

      //Mantenimiento de tipos de animales
      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de animales';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_tipos_animales-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de animales';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_tipos_animales-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de animales';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_tipos_animales-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de animales';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_tipos_animales-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de animales';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_tipos_animales-eliminar';
      $permiso->save();

      //Mantenimiento de tipos de servicio
      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de servicio';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_tipos_servicios-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de servicio';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_tipos_servicios-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de servicio';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_tipos_servicios-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de servicio';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_tipos_servicios-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'tipos de servicio';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_tipos_servicios-eliminar';
      $permiso->save();

      //Mantenimiento de animales en venta
      $permiso = new \App\Permiso();
      $permiso->categoria = 'animales en venta';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_animales_en_venta-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'animales en venta';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_animales_en_venta-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'animales en venta';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_animales_en_venta-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'animales en venta';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_animales_en_venta-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'animales en venta';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_animales_en_venta-eliminar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'animales en venta';
      $permiso->nombre = 'Imagenes';
      $permiso->descripcion = 'mant_animales_en_venta-imagenes';
      $permiso->save();

      //Mantenimiento de citas
      $permiso = new \App\Permiso();
      $permiso->categoria = 'citas';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_citas-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'citas';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_citas-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'citas';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_citas-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'citas';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_citas-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'citas';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_citas-eliminar';
      $permiso->save();

      //Proceso de Calendarización de citas
      $permiso = new \App\Permiso();
      $permiso->categoria = 'calendarizacion';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'pro_calendarizacion-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'calendarizacion';
      $permiso->nombre = 'Añadir';
      $permiso->descripcion = 'pro_calendarizacion-Añadir';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'calendarizacion';
      $permiso->nombre = 'Modificar';
      $permiso->descripcion = 'pro_calendarizacion-Modificar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'calendarizacion';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'pro_calendarizacion-Eliminar';
      $permiso->save();

      //Proceso de expediente digital
      $permiso = new \App\Permiso();
      $permiso->categoria = 'expediente';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'pro_expediente-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'expediente';
      $permiso->nombre = 'Añadir_Resultados';
      $permiso->descripcion = 'pro_expediente-Añadir_Resultados';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'expediente';
      $permiso->nombre = 'Añadir_Chequeos';
      $permiso->descripcion = 'pro_expediente-Añadir_Chequeos';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'expediente';
      $permiso->nombre = 'Modificar';
      $permiso->descripcion = 'pro_expediente-Modificar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'expediente';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'pro_expediente-Eliminar';
      $permiso->save();

      //Proceso de registro de Adopcion de animales
      $permiso = new \App\Permiso();
      $permiso->categoria = 'registro de adopcion';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'pro_registro_adopcion-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'registro de adopcion';
      $permiso->nombre = 'Añadir';
      $permiso->descripcion = 'pro_registro_adopcion-Añadir';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'registro de adopcion';
      $permiso->nombre = 'Finalizar';
      $permiso->descripcion = 'pro_registro_adopcion-Finalizar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'registro de adopcion';
      $permiso->nombre = 'Eliminar_Grupal';
      $permiso->descripcion = 'pro_registro_adopcion-Eliminar_Grupal';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'registro de adopcion';
      $permiso->nombre = 'Eliminar_Individual';
      $permiso->descripcion = 'pro_registro_adopcion-Eliminar_Individual';
      $permiso->save();

      //Proceso de solicitud de Adopcion de animales
      $permiso = new \App\Permiso();
      $permiso->categoria = 'solicitud de adopcion';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'pro_solicitud_adopcion-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'solicitud de adopcion';
      $permiso->nombre = 'Añadir';
      $permiso->descripcion = 'pro_solicitud_adopcion-Añadir';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'solicitud de adopcion';
      $permiso->nombre = 'Finalizar';
      $permiso->descripcion = 'pro_solicitud_adopcion-Finalizar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'solicitud de adopcion';
      $permiso->nombre = 'Eliminar_Grupal';
      $permiso->descripcion = 'pro_solicitud_adopcion-Eliminar_Grupal';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'solicitud de adopcion';
      $permiso->nombre = 'Eliminar_Individual';
      $permiso->descripcion = 'pro_solicitud_adopcion-Eliminar_Individual';
      $permiso->save();

      //Proceso de venta de animales
      $permiso = new \App\Permiso();
      $permiso->categoria = 'venta de animales';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'pro_venta_animales-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'venta de animales';
      $permiso->nombre = 'Añadir';
      $permiso->descripcion = 'pro_venta_animales-Añadir';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'venta de animales';
      $permiso->nombre = 'Finalizar';
      $permiso->descripcion = 'pro_venta_animales-Finalizar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'venta de animales';
      $permiso->nombre = 'Eliminar_Grupal';
      $permiso->descripcion = 'pro_venta_animales-Eliminar_Grupal';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'venta de animales';
      $permiso->nombre = 'Eliminar_Individual';
      $permiso->descripcion = 'pro_venta_animales-Eliminar_Individual';
      $permiso->save();

      //Reporte de Usuarios
      $permiso = new \App\Permiso();
      $permiso->categoria = 'reporte de usuarios';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'rep_reporte_usuarios-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'reporte de usuarios';
      $permiso->nombre = 'Generar';
      $permiso->descripcion = 'rep_reporte_usuarios-Generar';
      $permiso->save();

      //Reporte de Pacientes
      $permiso = new \App\Permiso();
      $permiso->categoria = 'reporte de pacientes';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'rep_reporte_pacientes-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'reporte de pacientes';
      $permiso->nombre = 'Generar';
      $permiso->descripcion = 'rep_reporte_pacientes-Generar';
      $permiso->save();

      //Reporte de Citas
      $permiso = new \App\Permiso();
      $permiso->categoria = 'reporte de citas';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'rep_reporte_citas-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'reporte de citas';
      $permiso->nombre = 'Generar';
      $permiso->descripcion = 'rep_reporte_citas-Generar';
      $permiso->save();

      //Reporte de expediente medico
      $permiso = new \App\Permiso();
      $permiso->categoria = 'reporte de expediente medico';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'rep_reporte_expediente_medico-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'reporte de expediente medico';
      $permiso->nombre = 'Generar';
      $permiso->descripcion = 'rep_reporte_expediente_medico-Generar';
      $permiso->save();

      //Respaldos
      $permiso = new \App\Permiso();
      $permiso->categoria = 'respaldos';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'seg_respaldos-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'respaldos';
      $permiso->nombre = 'Añadir';
      $permiso->descripcion = 'seg_respaldos-Añadir';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'respaldos';
      $permiso->nombre = 'Restaurar';
      $permiso->descripcion = 'seg_respaldos-Restaurar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'respaldos';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'seg_respaldos-Eliminar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'respaldos';
      $permiso->nombre = 'Descargar';
      $permiso->descripcion = 'seg_respaldos-descargar';
      $permiso->save();
    }
}
