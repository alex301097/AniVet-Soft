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

Route::group(['prefix'=>'mantenimiento/usuarios', 'middleware'=>'auth'], function(){
  Route::get('/', 'UsuarioController@index')->name('usuarios');

  Route::post('añadir', 'UsuarioController@añadir_usuarios')->name('usuarios.añadir');

  Route::post('editar', 'UsuarioController@editar_usuarios')->name('usuarios.editar');

  Route::post('eliminar', 'UsuarioController@eliminar_usuarios')->name('usuarios.eliminar');

  Route::post('filtro/{estado}', 'UsuarioController@filtrar_usuarios')->name('filtro.usuarios');
});

Route::group(['prefix'=>'mantenimiento/tipos_animales', 'middleware'=>'auth'], function(){
  Route::get('/', 'TipoAnimalController@index')->name('tipos_animales');

  Route::post('añadir', 'TipoAnimalController@añadir_tipos_animales')->name('tipos_animales.añadir');

  Route::post('editar', 'TipoAnimalController@editar_tipos_animales')->name('tipos_animales.editar');

  Route::post('eliminar', 'TipoAnimalController@eliminar_tipos_animales')->name('tipos_animales.eliminar');

  Route::post('filtro/{estado}', 'TipoAnimalController@filtrar_tipos_animales')->name('filtro.tipos_animales');
});

Route::group(['prefix'=>'mantenimiento/animales_venta', 'middleware'=>'auth'], function(){
  Route::get('/', 'VentaAnimalController@index')->name('animales_venta');

  Route::get('detalle/{id}', 'VentaAnimalController@get_detalle_animales_venta')->name('animales_venta.get_detalle');

  Route::get('añadir', 'VentaAnimalController@get_añadir_animales_venta')->name('animales_venta.get_añadir');

  Route::post('añadir', 'VentaAnimalController@añadir_animales_venta')->name('animales_venta.añadir');

  Route::get('editar/{id}', 'VentaAnimalController@get_editar_animales_venta')->name('animales_venta.get_editar');

  Route::post('editar', 'VentaAnimalController@editar_animales_venta')->name('animales_venta.editar');

  Route::post('eliminar', 'VentaAnimalController@eliminar_animales_venta')->name('animales_venta.eliminar');

  Route::post('filtro/{estado}', 'VentaAnimalController@filtrar_animales_venta')->name('filtro.animales_venta');

  Route::post('file-upload', 'VentaAnimalController@upload_file')->name('file-upload.animales_venta');
});

Route::group(['prefix'=>'mantenimiento/animales_adopcion', 'middleware'=>'auth'], function(){
  Route::get('/', 'AdopcionAnimalController@index')->name('animales_adopcion');

  Route::get('detalle/{id}', 'AdopcionAnimalController@get_detalle_animales_adopcion')->name('animales_adopcion.get_detalle');

  Route::get('añadir', 'AdopcionAnimalController@get_añadir_animales_adopcion')->name('animales_adopcion.get_añadir');

  Route::post('añadir', 'AdopcionAnimalController@añadir_animales_adopcion')->name('animales_adopcion.añadir');

  Route::get('editar/{id}', 'AdopcionAnimalController@get_editar_animales_adopcion')->name('animales_adopcion.get_editar');

  Route::post('editar', 'AdopcionAnimalController@editar_animales_adopcion')->name('animales_adopcion.editar');

  Route::post('eliminar', 'AdopcionAnimalController@eliminar_animales_adopcion')->name('animales_adopcion.eliminar');

  Route::post('filtro/{estado}', 'AdopcionAnimalController@filtrar_animales_adopcion')->name('filtro.animales_adopcion');

  Route::post('file-upload', 'AdopcionAnimalController@upload_file')->name('file-upload.animales_adopcion');
});

Route::group(['prefix'=>'adopcion', 'middleware'=>'auth'], function(){
  Route::get('/', 'AdopcionController@index')->name('adopciones');

  Route::get('detalle/{id}', 'AdopcionController@get_detalle_adopciones')->name('adopciones.get_detalle');

  Route::get('añadir', 'AdopcionController@get_añadir_adopciones')->name('adopciones.get_añadir');

  Route::post('añadir', 'AdopcionController@añadir_adopciones')->name('adopciones.añadir');

  Route::get('editar/{id}', 'AdopcionController@get_editar_adopciones')->name('adopciones.get_editar');

  Route::post('editar', 'AdopcionController@editar_adopciones')->name('adopciones.editar');

  Route::post('eliminar', 'AdopcionController@eliminar_adopciones')->name('adopciones.eliminar');
});

Route::group(['prefix'=>'mantenimiento/citas', 'middleware'=>'auth'], function(){
  Route::get('/', 'CitasController@index')->name('citas');

  Route::get('detalle/{id}', 'CitasController@get_detalle_citas')->name('citas.get_detalle');

  Route::get('añadir', 'CitasController@get_añadir_citas')->name('citas.get_añadir');

  Route::post('añadir', 'CitasController@añadir_citas')->name('citas.añadir');

  Route::get('editar/{id}', 'CitasController@get_editar_citas')->name('citas.get_editar');

  Route::post('editar', 'CitasController@editar_citas')->name('citas.editar');

  Route::post('eliminar', 'CitasController@eliminar_citas')->name('citas.eliminar');
});

Route::group(['prefix'=>'mantenimiento/accesos', 'middleware'=>'auth'], function(){
  Route::get('/', 'AccesosController@index')->name('accesos');

  Route::post('añadir', 'AccesosController@añadir_accesos')->name('accesos.añadir');

  Route::post('eliminar', 'AccesosController@eliminar_accesos')->name('accesos.eliminar');
});


// Route::get('registro', 'HomeController@index')->name('home');
