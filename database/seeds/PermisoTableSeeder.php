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
      $permiso->categoria = 'Mantenimiento de usuarios';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_usuarios-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de usuarios';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_usuarios-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de usuarios';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_usuarios-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de usuarios';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_usuarios-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de usuarios';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_usuarios-eliminar';
      $permiso->save();

      //Mantenimiento de pacientes
      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de pacientes';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_pacientes-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de pacientes';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_pacientes-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de pacientes';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_pacientes-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de pacientes';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_pacientes-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de pacientes';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_pacientes-eliminar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de pacientes';
      $permiso->nombre = 'Imagenes';
      $permiso->descripcion = 'mant_pacientes-imagenes';
      $permiso->save();

      //Mantenimiento de roles
      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de roles';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_roles-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de roles';
      $permiso->nombre = 'Asignar permisos';
      $permiso->descripcion = 'mant_roles-asignar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de roles';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_roles-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de roles';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_roles-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de roles';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_roles-eliminar';
      $permiso->save();

      //Mantenimiento de tipos de animales
      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de animales';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_tipos_animales-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de animales';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_tipos_animales-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de animales';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_tipos_animales-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de animales';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_tipos_animales-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de animales';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_tipos_animales-eliminar';
      $permiso->save();

      //Mantenimiento de tipos de servicio
      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de servicio';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_tipos_servicios-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de servicio';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_tipos_servicios-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de servicio';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_tipos_servicios-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de servicio';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_tipos_servicios-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de tipos de servicio';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_tipos_servicios-eliminar';
      $permiso->save();

      //Mantenimiento de animales en venta
      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de animales en venta';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_animales_en_venta-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de animales en venta';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_animales_en_venta-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de animales en venta';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_animales_en_venta-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de animales en venta';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_animales_en_venta-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de animales en venta';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_animales_en_venta-eliminar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de animales en venta';
      $permiso->nombre = 'Imagenes';
      $permiso->descripcion = 'mant_animales_en_venta-imagenes';
      $permiso->save();

      //Mantenimiento de citas
      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de citas';
      $permiso->nombre = 'Inicio/Lista';
      $permiso->descripcion = 'mant_citas-index';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de citas';
      $permiso->nombre = 'Registrar';
      $permiso->descripcion = 'mant_citas-crear';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de citas';
      $permiso->nombre = 'Detalles';
      $permiso->descripcion = 'mant_citas-detalle';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de citas';
      $permiso->nombre = 'Editar';
      $permiso->descripcion = 'mant_citas-editar';
      $permiso->save();

      $permiso = new \App\Permiso();
      $permiso->categoria = 'Mantenimiento de citas';
      $permiso->nombre = 'Eliminar';
      $permiso->descripcion = 'mant_citas-eliminar';
      $permiso->save();

    }
}
