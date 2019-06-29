<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Auth;
use App\TipoAnimal;
use Session;

class TipoAnimalController extends Controller
{
  public function index()
  {
    $tipos_animales = TipoAnimal::orderBy('created_at', 'desc')->paginate();
    return view('mantenimientos.tipo_animales.index', ['tipos_animales'=>$tipos_animales]);
  }

  public function filtrar_tipos_animales($filtro)
  {

    if($filtro == "0" || $filtro == null){
      $tipos_animales = TipoAnimal::orderBy('created_at', 'desc')->paginate();
    }else{
      $tipos_animales = TipoAnimal::onlyTrashed()->orderBy('created_at', 'desc')->paginate();
    }

    return response()->json($tipos_animales);
  }

  public function añadir_tipos_animales(Request $request)
  {
    $reglas = [
      'descripcion' => 'required|string|min:4|max:255',
    ];

    $inputs = [
      'descripcion' => $request->descripcion,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $tipo_animal = new TipoAnimal();
      $tipo_animal->descripcion = $request->input('descripcion');
      $tipo_animal->save();

      return response()->json($tipo_animal);
    }
  }

  public function editar_tipos_animales(Request $request)
  {
    $tipo_animal = TipoAnimal::find($request->input('id_edicion'));

    $reglas = [
      'descripcion_edicion' => 'required|string|min:4|max:255',
    ];

    $inputs = [
      'descripcion_edicion' => $request->descripcion_edicion,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $tipo_animal->descripcion = $request->input('descripcion_edicion');
      $tipo_animal->save();

      return response()->json($tipo_animal);
    }
  }

  public function eliminar_tipos_animales(Request $request)
  {
    $tipo_animal = TipoAnimal::withTrashed()->where('id', $request->input('id'))->first();
    if(!$tipo_animal->trashed()){
      $tipo_animal->delete();
      return response()->json($tipo_animal);
    }else{
      $tipo_animal->restore();
      return response()->json($tipo_animal);
    }
  }
}
