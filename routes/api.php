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
Route::get('reporte_citas/{min?}/{max?}/{estado?}', function($min = null, $max = null, $estado = null){
  if(!empty($estado) && $estado == "deshabilitados"){
    if (!empty($min) && !empty($max)) {
    return datatables()
    ->eloquent(Cita::query()->orderBy('created_at', 'desc')->whereBetween('fecha', [$min, $max])->onlyTrashed()->with('paciente', 'servicio'))
    ->toJson();
    }
    return datatables()
    ->eloquent(Cita::query()->orderBy('created_at', 'desc')->onlyTrashed()->with('paciente', 'servicio'))
    ->toJson();
  }else {
    if (!empty($min) && !empty($max)) {
    return datatables()
    ->eloquent(Cita::query()->orderBy('created_at', 'desc')->whereBetween('fecha', [$min, $max])->with('paciente', 'servicio'))
    ->toJson();
    }
    return datatables()
    ->eloquent(Cita::query()->orderBy('created_at', 'desc')->with('paciente', 'servicio'))
    ->toJson();
  }
});
Route::get('reporte_usuarios/{min?}/{max?}/{rol?}/{estado?}', function($min = null, $max = null, $rol = null, $estado = null){
  if(!empty($estado) && $estado == "deshabilitados"){
    if (!empty($min) && !empty($max)) {
      if(!empty($rol) && $rol != "0"){
        return datatables()
        ->eloquent(User::query()->orderBy('created_at', 'desc')
        ->where('rol_id', '=', $rol)
        ->whereBetween('created_at', [$min, $max])->onlyTrashed()
        ->with('rol'))
        ->toJson();
      }else{
        return datatables()
        ->eloquent(User::query()->orderBy('created_at', 'desc')
        ->whereBetween('created_at', [$min, $max])->onlyTrashed()
        ->with('rol'))
        ->toJson();
      }
    }else{
      if(!empty($rol) && $rol != "0"){
        return datatables()
        ->eloquent(User::query()->orderBy('created_at', 'desc')
        ->where('rol_id', '=', $rol)
        ->onlyTrashed()
        ->with('rol'))
        ->toJson();
      }else{
        return datatables()
        ->eloquent(User::query()->orderBy('created_at', 'desc')
        ->onlyTrashed()
        ->with('rol'))
        ->toJson();
      }
    }
  }else {
    if (!empty($min) && !empty($max)) {
      if(!empty($rol) && $rol != "0"){
        return datatables()
        ->eloquent(User::query()->orderBy('created_at', 'desc')
        ->where('rol_id', '=', $rol)
        ->whereBetween('created_at', [$min, $max])
        ->with('rol'))
        ->toJson();
      }else{
        return datatables()
        ->eloquent(User::query()->orderBy('created_at', 'desc')
        ->whereBetween('created_at', [$min, $max])
        ->with('rol'))
        ->toJson();
      }
    }else{
      if(!empty($rol) && $rol != "0"){
        return datatables()
        ->eloquent(User::query()->orderBy('created_at', 'desc')
        ->where('rol_id', '=', $rol)
        ->with('rol'))
        ->toJson();
      }else{
        return datatables()
        ->eloquent(User::query()->orderBy('created_at', 'desc')
        ->with('rol'))
        ->toJson();
      }
    }
  }
});
Route::get('reporte_pacientes/{min?}/{max?}/{estado?}', function($min = null, $max = null, $estado = null){
  if(!empty($estado) && $estado == "deshabilitados"){
    if (!empty($min) && !empty($max)) {
    return datatables()
    ->eloquent(Paciente::query()->orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])->onlyTrashed()->with('tipo_animal'))
    ->toJson();
    }
    return datatables()
    ->eloquent(Paciente::query()->orderBy('created_at', 'desc')->onlyTrashed()->with('tipo_animal'))
    ->toJson();
  }else {
    if (!empty($min) && !empty($max)) {
    return datatables()
    ->eloquent(Paciente::query()->orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])->with('tipo_animal'))
    ->toJson();
    }
    return datatables()
    ->eloquent(Paciente::query()->orderBy('created_at', 'desc')->with('tipo_animal'))
    ->toJson();
  }
});

Route::get('reporte_expediente_medico/{min?}/{max?}/{paciente?}', function($min = null, $max = null, $paciente = null){
  if(!empty($paciente) && $paciente != "0"){
    if (!empty($min) && !empty($max)) {
    return datatables()
    ->eloquent(Cita::query()->has('resultado')->orderBy('created_at', 'desc')
    ->where('paciente_id', '=', $paciente)
    ->whereBetween('fecha', [$min, $max])->withTrashed()->with('paciente', 'servicio'))
    ->addColumn('btn', 'reportes.expediente_medico.actions')
    ->rawColumns(['btn'])
    ->toJson();
    }
    return datatables()
    ->eloquent(Cita::query()->has('resultado')->orderBy('created_at', 'desc')
    ->where('paciente_id', '=', $paciente)->withTrashed()->with('paciente', 'servicio'))
    ->addColumn('btn', 'reportes.expediente_medico.actions')
    ->rawColumns(['btn'])
    ->toJson();
  }else {
    if (!empty($min) && !empty($max)) {
    return datatables()
    ->eloquent(Cita::query()->has('resultado')->orderBy('created_at', 'desc')->whereBetween('fecha', [$min, $max])->withTrashed()->with('paciente', 'servicio'))
    ->addColumn('btn', 'reportes.expediente_medico.actions')
    ->rawColumns(['btn'])
    ->toJson();
    }
    return datatables()
    ->eloquent(Cita::query()->has('resultado')->orderBy('created_at', 'desc')->withTrashed()->with('paciente', 'servicio'))
    ->addColumn('btn', 'reportes.expediente_medico.actions')
    ->rawColumns(['btn'])
    ->toJson();
  }
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });                                                                                                                       
