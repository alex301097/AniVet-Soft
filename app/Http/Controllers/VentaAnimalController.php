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
use Session;

class VentaAnimalController extends Controller
{
  public function index()
  {
    $animales = AnimalVenta::orderBy('created_at', 'desc')->paginate();
    $tipos_animales = TipoAnimal::all();
    return view('mantenimientos.animales_en_venta.index', ['animales'=>$animales,'tipos_animales'=>$tipos_animales]);
  }

  public function get_detalle_animales_venta($id)
  {
    $animal = AnimalVenta::find($id);
    $tipos_animales = TipoAnimal::all();
    return view('mantenimientos.animales_en_venta.detalle', ['animal'=>$animal,'tipos_animales'=>$tipos_animales]);
  }

  public function get_añadir_animales_venta()
  {
    $tipos_animales = TipoAnimal::all();
    return view('mantenimientos.animales_en_venta.registrar', ['tipos_animales'=>$tipos_animales]);
  }

  public function añadir_animales_venta(Request $request)
  {
    $reglas = [
      'tipo_animal' => 'required',
      'nombre' => 'required',
      'edad' => 'required',
      'peso' => 'required',
      'raza' => 'required',
      'fecha_nacimiento' => 'required',
      'sexo' => 'required',
      'precio' => 'required',
      'estado' => 'required',
    ];

    $inputs = [
      'tipo_animal' => $request->tipo_animal,
      'nombre' => $request->nombre,
      'edad' => $request->edad,
      'peso' => $request->peso,
      'raza' => $request->raza,
      'fecha_nacimiento' => $request->fecha_nacimiento,
      'sexo' => $request->sexo,
      'precio' => $request->precio,
      'estado' => $request->estado,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $animal = new AnimalVenta();

      $animal->nombre = $request->input('nombre');
      $animal->edad = $request->input('edad');
      $animal->peso = $request->input('peso');
      $animal->raza = $request->input('raza');
      $animal->fecha_nacimiento = $request->input('fecha_nacimiento');
      $animal->sexo = $request->input('sexo');
      $animal->precio = $request->input('precio');
      $animal->observaciones = $request->input('observaciones');
      $animal->condiciones = $request->input('condiciones');
      $animal->estado = $request->input('estado');
      $animal->tipo_animal()->associate(TipoAnimal::find($request->input('tipo_animal')));
      $animal->save();

      return response()->json($animal);
    }
  }

  public function get_editar_animales_venta($id)
  {
    $animal = AnimalVenta::find($id);
    $tipos_animales = TipoAnimal::all();
    return view('mantenimientos.animales_en_venta.editar', ['animal'=>$animal,'tipos_animales'=>$tipos_animales]);
  }

  public function editar_animales_venta(Request $request)
  {

    $animal = AnimalVenta::find($request->input('id_edicion'));

    $reglas = [
      'tipo_animal' => 'required',
      'nombre' => 'required',
      'edad' => 'required',
      'peso' => 'required',
      'raza' => 'required',
      'fecha_nacimiento' => 'required',
      'sexo' => 'required',
      'precio' => 'required',
      'estado' => 'required',
    ];

    $inputs = [
      'tipo_animal' => $request->tipo_animal,
      'nombre' => $request->nombre,
      'edad' => $request->edad,
      'peso' => $request->peso,
      'raza' => $request->raza,
      'fecha_nacimiento' => $request->fecha_nacimiento,
      'sexo' => $request->sexo,
      'precio' => $request->precio,
      'estado' => $request->estado,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $animal->nombre = $request->input('nombre');
      $animal->edad = $request->input('edad');
      $animal->peso = $request->input('peso');
      $animal->raza = $request->input('raza');
      $animal->fecha_nacimiento = $request->input('fecha_nacimiento');
      $animal->sexo = $request->input('sexo');
      $animal->precio = $request->input('precio');
      $animal->observaciones = $request->input('observaciones');
      $animal->condiciones = $request->input('condiciones');
      $animal->estado = $request->input('estado');
      $animal->tipo_animal()->associate(TipoAnimal::find($request->input('tipo_animal')));
      $animal->save();

      return response()->json($animal);
    }
  }

  public function filtrar_animales_venta($filtro)
  {

    if($filtro == "0" || $filtro == null){
      $animales = AnimalVenta::orderBy('created_at', 'desc')->with('tipo_animal')->paginate();
    }else{
      $animales = AnimalVenta::onlyTrashed()->orderBy('created_at', 'desc')->with('tipo_animal')->paginate();
    }

    return response()->json($animales);
  }

  public function eliminar_animales_venta(Request $request)
  {
    $animal = AnimalVenta::withTrashed()->where('id', $request->input('id'))->first();
    if(!$animal->trashed()){
      $animal->delete();
      return response()->json($animal);
    }else{
      $animal->restore();
      return response()->json($animal);
    }
  }

  public function upload_file(Request $request)
  {
    $animal = AnimalVenta::find($request->input('id_animal'));
    $img = $request->file('Imagen');
    $text = "";

    if($img){
    $file_route = time().'_'.$img->getClientOriginalName();
    Storage::disk('imgPerfiles')->put($file_route,file_get_contents($img->getRealPath()));

    $animal->imagenes()->create(['imagen'=>$file_route]);

    $text = "Hecho, imagenes subidas.";
    }else{
      $text = "Error, imagenes no subidas.";
    }

    return $text;
  }
}
