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

Route::group(['prefix'=>'usuarios', 'middleware'=>'auth'], function(){
  Route::get('/', 'UsuarioController@index')->name('usuarios');

  Route::post('añadir', 'UsuarioController@añadir_usuarios')->name('usuarios.añadir');

  Route::post('editar', 'UsuarioController@editar_usuarios')->name('usuarios.editar');

  Route::post('eliminar', 'UsuarioController@eliminar_usuarios')->name('usuarios.eliminar');

  Route::post('filtro/{estado}', 'UsuarioController@filtrar_usuarios')->name('filtro.usuarios');
});


// Route::get('registro', 'HomeController@index')->name('home');
