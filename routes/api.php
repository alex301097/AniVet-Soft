<?php

use Illuminate\Http\Request;
use App\Paciente;
use App\User;
use App\TipoAnimal;
use App\TipoServicio;
use App\AnimalVenta;
use App\Cita;
use App\Rol;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('citas', function(){
  return datatables()
  ->eloquent(Cita::query()->orderBy('created_at', 'desc')->withTrashed())
  ->addColumn('btn', 'mantenimientos.citas.actions')
  ->rawColumns(['btn'])
  ->toJson();
});

Route::get('roles', function(){
  return datatables()
  ->eloquent(Rol::query()->orderBy('created_at', 'desc')->withTrashed())
  ->addColumn('estado', 'mantenimientos.roles.estado')
  ->addColumn('btn', 'mantenimientos.roles.actions')
  ->rawColumns(['btn', 'estado'])
  ->toJson();
});

Route::get('pacientes', function(){
  return datatables()
  ->eloquent(Paciente::query()->orderBy('created_at', 'desc')->withTrashed())
  ->addColumn('estado', 'mantenimientos.pacientes.estado')
  ->addColumn('btn', 'mantenimientos.pacientes.actions')
  ->rawColumns(['btn', 'estado'])
  ->toJson();
});

Route::get('usuarios', function(){
  return datatables()
  ->eloquent(User::query()->orderBy('created_at', 'desc')->withTrashed())
  ->addColumn('usuario', 'mantenimientos.usuarios.usuario')
  ->addColumn('estado', 'mantenimientos.usuarios.estado')
  ->addColumn('btn', 'mantenimientos.usuarios.actions')
  ->rawColumns(['btn', 'estado', 'usuario'])
  ->toJson();
});

Route::get('tipos_animales', function(){
  return datatables()
  ->eloquent(TipoAnimal::query()->orderBy('created_at', 'desc')->withTrashed())
  ->addColumn('estado', 'mantenimientos.tipo_animales.estado')
  ->addColumn('btn', 'mantenimientos.tipo_animales.actions')
  ->rawColumns(['btn', 'estado'])
  ->toJson();
});

Route::get('tipos_servicios', function(){
  return datatables()
  ->eloquent(TipoServicio::query()->orderBy('created_at', 'desc')->withTrashed())
  ->addColumn('estado', 'mantenimientos.tipo_servicios.estado')
  ->addColumn('btn', 'mantenimientos.tipo_servicios.actions')
  ->rawColumns(['btn', 'estado'])
  ->toJson();
});

Route::get('animales_en_venta', function(){
  return datatables()
  ->eloquent(AnimalVenta::query()->orderBy('created_at', 'desc')->withTrashed())
  ->addColumn('estado', 'mantenimientos.animales_en_venta.estado')
  ->addColumn('btn', 'mantenimientos.animales_en_venta.actions')
  ->rawColumns(['btn', 'estado'])
  ->toJson();
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
