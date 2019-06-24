<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Auth;
use App\TipoServicio;
use Session;

class TipoServicioController extends Controller
{
  public function index()
  {
    $tipos_servicios = TipoServicio::orderBy('created_at', 'desc')->paginate();
    return view('mantenimientos.tipo_servicios.index', ['tipos_servicios'=>$tipos_servicios]);
  }

  public function filtrar_tipos_servicios($filtro)
  {

    if($filtro == "0" || $filtro == null){
      $tipos_servicios = TipoServicio::orderBy('created_at', 'desc')->paginate();
    }else{
      $tipos_servicios = TipoServicio::onlyTrashed()->orderBy('created_at', 'desc')->paginate();
    }

    return response()->json($tipos_servicios);
  }

  public function añadir_tipos_servicios(Request $request)
  {
    $reglas = [
      'descripcion' => 'required',
    ];

    $inputs = [
      'descripcion' => $request->descripcion,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $tipo_servicio = new TipoServicio();
      $tipo_servicio->descripcion = $request->input('descripcion');
      $tipo_servicio->save();

      return response()->json($tipo_servicio);
    }
  }

  public function editar_tipos_servicios(Request $request)
  {
    $tipo_servicio = TipoServicio::find($request->input('id_edicion'));

    $reglas = [
      'descripcion_edicion' => 'required',
    ];

    $inputs = [
      'descripcion_edicion' => $request->descripcion_edicion,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $tipo_servicio->descripcion = $request->input('descripcion_edicion');
      $tipo_servicio->save();

      return response()->json($tipo_servicio);
    }
  }

  public function eliminar_tipos_servicios(Request $request)
  {
    $tipo_servicio = TipoServicio::withTrashed()->where('id', $request->input('id'))->first();
    if(!$tipo_servicio->trashed()){
      $tipo_servicio->delete();
      return response()->json($tipo_servicio);
    }else{
      $tipo_servicio->restore();
      return response()->json($tipo_servicio);
    }
  }

}
