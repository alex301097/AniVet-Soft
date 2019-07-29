<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('produccion', 'HomeController@index_produccion')->name('produccion')->middleware('auth');

Route::group(['prefix'=>'mantenimiento/usuarios', 'middleware'=>'auth'], function(){
  Route::get('/', 'UsuarioController@index')->name('usuarios')->middleware('can:mant_usuarios-index');

  Route::post('añadir', 'UsuarioController@añadir_usuarios')->name('usuarios.añadir')->middleware('can:mant_usuarios-crear');

  Route::post('editar', 'UsuarioController@editar_usuarios')->name('usuarios.editar')->middleware('can:mant_usuarios-editar');

  Route::post('eliminar', 'UsuarioController@eliminar_usuarios')->name('usuarios.eliminar')->middleware('can:mant_usuarios-eliminar');

  Route::post('filtro/{estado}', 'UsuarioController@filtrar_usuarios')->name('filtro.usuarios')->middleware('can:mant_usuarios-index');

  Route::get('perfil/{id}', 'UsuarioController@get_editar_perfil')->name('usuarios.get_editar_perfil');

  Route::post('perfil', 'UsuarioController@editar_perfil')->name('usuarios.editar_perfil');

});

Route::group(['prefix'=>'mantenimiento/tipos_animales', 'middleware'=>'auth'], function(){
  Route::get('/', 'TipoAnimalController@index')->name('tipos_animales')->middleware('can:mant_tipos_animales-index');

  Route::post('añadir', 'TipoAnimalController@añadir_tipos_animales')->name('tipos_animales.añadir')->middleware('can:mant_tipos_animales-crear');

  Route::post('editar', 'TipoAnimalController@editar_tipos_animales')->name('tipos_animales.editar')->middleware('can:mant_tipos_animales-editar');

  Route::post('eliminar', 'TipoAnimalController@eliminar_tipos_animales')->name('tipos_animales.eliminar')->middleware('can:mant_tipos_animales-eliminar');

  Route::post('filtro/{estado}', 'TipoAnimalController@filtrar_tipos_animales')->name('filtro.tipos_animales')->middleware('can:mant_tipos_animales-index');
});

Route::group(['prefix'=>'mantenimiento/animales_venta', 'middleware'=>'auth'], function(){
  Route::get('/', 'VentaAnimalController@index')->name('animales_venta')->middleware('can:mant_animales_en_venta-index');

  Route::get('detalle/{id}', 'VentaAnimalController@get_detalle_animales_venta')->name('animales_venta.get_detalle')->middleware('can:mant_animales_en_venta-detalle');

  Route::get('añadir', 'VentaAnimalController@get_añadir_animales_venta')->name('animales_venta.get_añadir')->middleware('can:mant_animales_en_venta-crear');

  Route::post('añadir', 'VentaAnimalController@añadir_animales_venta')->name('animales_venta.añadir')->middleware('can:mant_animales_en_venta-crear');

  Route::get('editar/{id}', 'VentaAnimalController@get_editar_animales_venta')->name('animales_venta.get_editar')->middleware('can:mant_animales_en_venta-editar');

  Route::post('editar', 'VentaAnimalController@editar_animales_venta')->name('animales_venta.editar')->middleware('can:mant_animales_en_venta-editar');

  Route::post('eliminar', 'VentaAnimalController@eliminar_animales_venta')->name('animales_venta.eliminar')->middleware('can:mant_animales_en_venta-eliminar');

  Route::post('filtro/{estado}', 'VentaAnimalController@filtrar_animales_venta')->name('filtro.animales_venta')->middleware('can:mant_animales_en_venta-index');

  Route::post('file-upload', 'VentaAnimalController@upload_file')->name('file-upload.animales_venta')->middleware('can:mant_animales_en_venta-imagenes');
});

Route::group(['prefix'=>'mantenimiento/animales_adopcion', 'middleware'=>'auth'], function(){
  Route::get('/', 'AdopcionAnimalController@index')->name('animales_adopcion')->middleware('auth');

  Route::get('detalle/{id}', 'AdopcionAnimalController@get_detalle_animales_adopcion')->name('animales_adopcion.get_detalle')->middleware('auth');

  Route::get('añadir', 'AdopcionAnimalController@get_añadir_animales_adopcion')->name('animales_adopcion.get_añadir')->middleware('auth');

  Route::post('añadir', 'AdopcionAnimalController@añadir_animales_adopcion')->name('animales_adopcion.añadir')->middleware('auth');

  Route::get('editar/{id}', 'AdopcionAnimalController@get_editar_animales_adopcion')->name('animales_adopcion.get_editar')->middleware('auth');

  Route::post('editar', 'AdopcionAnimalController@editar_animales_adopcion')->name('animales_adopcion.editar')->middleware('auth');

  Route::post('eliminar', 'AdopcionAnimalController@eliminar_animales_adopcion')->name('animales_adopcion.eliminar')->middleware('auth');

  Route::post('filtro/{estado}', 'AdopcionAnimalController@filtrar_animales_adopcion')->name('filtro.animales_adopcion')->middleware('auth');

  Route::post('file-upload', 'AdopcionAnimalController@upload_file')->name('file-upload.animales_adopcion')->middleware('auth');
});

Route::group(['prefix'=>'adopcion', 'middleware'=>'auth'], function(){
  Route::get('/', 'AdopcionController@index')->name('adopciones')->middleware('auth');

  Route::get('detalle/{id}', 'AdopcionController@get_detalle_adopciones')->name('adopciones.get_detalle')->middleware('auth');

  Route::get('añadir', 'AdopcionController@get_añadir_adopciones')->name('adopciones.get_añadir')->middleware('auth');

  Route::post('añadir', 'AdopcionController@añadir_adopciones')->name('adopciones.añadir')->middleware('auth');

  Route::get('editar/{id}', 'AdopcionController@get_editar_adopciones')->name('adopciones.get_editar')->middleware('auth');

  Route::post('editar', 'AdopcionController@editar_adopciones')->name('adopciones.editar')->middleware('auth');

  Route::post('eliminar', 'AdopcionController@eliminar_adopciones')->name('adopciones.eliminar')->middleware('auth');
});

Route::group(['prefix'=>'mantenimiento/tipos_servicios', 'middleware'=>'auth'], function(){
  Route::get('/', 'TipoServicioController@index')->name('tipos_servicios')->middleware('can:mant_tipos_servicios-index');

  Route::post('añadir', 'TipoServicioController@añadir_tipos_servicios')->name('tipos_servicios.añadir')->middleware('can:mant_tipos_servicios-crear');

  Route::post('editar', 'TipoServicioController@editar_tipos_servicios')->name('tipos_servicios.editar')->middleware('can:mant_tipos_servicios-editar');

  Route::post('eliminar', 'TipoServicioController@eliminar_tipos_servicios')->name('tipos_servicios.eliminar')->middleware('can:mant_tipos_servicios-eliminar');

  Route::post('filtro/{estado}', 'TipoServicioController@filtrar_tipos_servicios')->name('filtro.tipos_servicios')->middleware('can:mant_tipos_servicios-index');
});

Route::group(['prefix'=>'mantenimiento/pacientes', 'middleware'=>'auth'], function(){
  Route::get('/', 'PacienteController@index')->name('pacientes')->middleware('can:mant_pacientes-index');

  Route::get('detalle/{id}', 'PacienteController@get_detalle_pacientes')->name('pacientes.get_detalle')->middleware('can:mant_pacientes-detalle');

  Route::get('añadir', 'PacienteController@get_añadir_pacientes')->name('pacientes.get_añadir')->middleware('can:mant_pacientes-crear');

  Route::post('añadir', 'PacienteController@añadir_pacientes')->name('pacientes.añadir')->middleware('can:mant_pacientes-crear');

  Route::get('editar/{id}', 'PacienteController@get_editar_pacientes')->name('pacientes.get_editar')->middleware('can:mant_pacientes-editar');

  Route::post('editar', 'PacienteController@editar_pacientes')->name('pacientes.editar')->middleware('can:mant_pacientes-editar');

  Route::post('eliminar', 'PacienteController@eliminar_pacientes')->name('pacientes.eliminar')->middleware('can:mant_pacientes-eliminar');

  Route::post('filtro/{estado}', 'PacienteController@filtrar_pacientes')->name('filtro.pacientes')->middleware('can:mant_pacientes-index');

  Route::post('file-upload', 'PacienteController@upload_file')->name('file-upload.pacientes')->middleware('can:mant_pacientes-imagenes');

  Route::get('autocompleteDuenno', 'PacienteController@autocompleteDuenno')->name('autocompleteDuenno');
});


Route::group(['prefix'=>'mantenimiento/citas', 'middleware'=>'auth'], function(){
  Route::get('/', 'CitasController@index')->name('citas')->middleware('can:mant_citas-index');

  Route::get('detalle/{id}', 'CitasController@get_detalle_citas')->name('citas.get_detalle')->middleware('can:mant_citas-detalle');

  Route::get('añadir', 'CitasController@get_añadir_citas')->name('citas.get_añadir')->middleware('can:mant_citas-crear');

  Route::post('añadir', 'CitasController@añadir_citas')->name('citas.añadir')->middleware('can:mant_citas-crear');

  Route::get('editar/{id}', 'CitasController@get_editar_citas')->name('citas.get_editar')->middleware('can:mant_citas-editar');

  Route::post('editar', 'CitasController@editar_citas')->name('citas.editar')->middleware('can:mant_citas-editar');

  Route::post('eliminar', 'CitasController@eliminar_citas')->name('citas.eliminar')->middleware('can:mant_citas-eliminar');

  Route::get('autocompletePacienteCita', 'CitasController@autocompletePacienteCita')->name('autocompletePacienteCita')->middleware('can:mant_citas-index');
});

Route::group(['prefix'=>'mantenimiento/roles', 'middleware'=>'auth'], function(){
  Route::get('/', 'RolController@index')->name('roles')->middleware('can:mant_roles-index');

  Route::post('añadir', 'RolController@añadir_roles')->name('roles.añadir')->middleware('can:mant_roles-crear');

  Route::get('asignar/{id}', 'RolController@get_asignar_permisos')->name('roles.permisos.get_asignar')->middleware('can:mant_roles-asignar');

  Route::post('asignar', 'RolController@asignar_permisos')->name('roles.permisos.asignar')->middleware('can:mant_roles-asignar');

  Route::post('eliminar', 'RolController@eliminar_roles')->name('roles.eliminar')->middleware('can:mant_roles-eliminar');

  Route::post('filtro/{estado}', 'RolController@filtrar_roles')->name('filtro.roles')->middleware('can:mant_roles-index');
});

Route::group(['prefix'=>'proceso/calendarizacion', 'middleware'=>'auth'], function(){
  Route::get('citas',
  [
    'uses'=>'CalendarizacionController@index',
    'as'=>'calendarizacion'
  ]);

  //Registra y edita una cita
  Route::post('registrar-cita',
  [
    'uses'=>'CalendarizacionController@postRegistrarCita',
    'as'=>'calendarizacion.registrar-cita'
  ]);

  Route::get('autocompletePacientes', 'CalendarizacionController@autocompletePacientes')->name('autocompletePacientes');

  //Deshabilitar cita
  Route::post('deshabilitar-cita',
  [
    'uses'=>'CalendarizacionController@deshabilitarCita',
    'as'=>'calendarizacion.deshabilitar-cita'
  ]);
});

Route::group(['prefix'=>'reportes', 'middleware'=>'auth'], function(){
  Route::get('citas', 'ReportesController@reporte_citas')->name('reportes.citas');
  Route::get('generar-reporte-citas', 'ReportesController@mostrar_pdf')->name('citas-pdf');
});


// Route::get('registro', 'HomeController@index')->name('home');
