<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Auth;
use App\AnimalVenta;
use App\TipoAnimal;
use App\Adopcion;
use Session;

class AdopcionController extends Controller
{
  public function index()
  {
    $animales = AnimalVenta::orderBy('created_at', 'desc')->paginate();
    $tipos_animales = TipoAnimal::all();
    return view('procesos.adopcion.index', ['animales'=>$animales,'tipos_animales'=>$tipos_animales]);
  }

  public function get_detalle_animales($id)
  {
    $adopcion = Adopcion::find($id);
    $tipos_animales = TipoAnimal::all();
    return view('procesos.adopcion.detalle', ['adopcion'=>$adopcion,'tipos_animales'=>$tipos_animales]);
  }

  public function get_añadir_animales()
  {
    $tipos_animales = TipoAnimal::all();
    return view('procesos.adopcion.registrar', ['tipos_animales'=>$tipos_animales]);
  }

  public function añadir_animales(Request $request)
  {
    $reglas = [
      'tipo_animal' => 'required',
    ];

    $inputs = [
      'tipo_animal' => $request->tipo_animal,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $animal = new AnimalVenta();

      $animal->nombre = $request->input('nombre');
      $animal->tipo_animal()->associate(TipoAnimal::find($request->input('tipo_animal')));
      $animal->save();

      return response()->json($animal);
    }
  }

  public function get_editar_adopciones($id)
  {
    $adopcion = Adopcion::find($id);
    $tipos_animales = TipoAnimal::all();
    return view('procesos.adopcion.editar', ['adopcion'=>$adopcion,'tipos_animales'=>$tipos_animales]);
  }

  public function editar_adopciones(Request $request)
  {

    $animal = AnimalVenta::find($request->input('id_edicion'));

    $reglas = [
      'tipo_animal' => 'required',
    ];

    $inputs = [
      'tipo_animal' => $request->tipo_animal,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $animal->nombre = $request->input('nombre');
      $animal->tipo_animal()->associate(TipoAnimal::find($request->input('tipo_animal')));
      $animal->save();

      return response()->json($animal);
    }
  }

  public function eliminar_adopciones(Request $request)
  {
    $adopcion = Adopcion::withTrashed()->where('id', $request->input('id'))->first();
    if(!$adopcion->trashed()){
      $adopcion->delete();
      return response()->json($adopcion);
    }else{
      $adopcion->restore();
      return response()->json($adopcion);
    }
  }
}
