<?php

use Illuminate\Http\Request;
use App\Paciente;

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
Route::get('pacientes', function(){
  return datatables()
  ->eloquent(Paciente::query()->withTrashed())
  ->addColumn('estado', 'mantenimientos.pacientes.estado')
  ->addColumn('btn', 'mantenimientos.pacientes.actions')
  ->rawColumns(['btn', 'estado'])
  ->toJson();
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
