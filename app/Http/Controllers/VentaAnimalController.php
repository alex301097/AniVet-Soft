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
use App\EncVenta;
use App\DetVenta;
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
      'edad' => 'required',
      'peso' => 'required',
      'raza' => 'required|string|min:3|max:255',
      'fecha_nacimiento' => 'required',
      'sexo' => 'required',
      'precio' => 'required|numeric',
      'observaciones' => 'required|string|min:3|max:255',
      'condiciones' => 'required|string|min:3|max:255',
      'cantidad' => 'required|numeric',
    ];

    $inputs = [
      'tipo_animal' => $request->tipo_animal,
      'edad' => $request->edad,
      'peso' => $request->peso,
      'raza' => $request->raza,
      'fecha_nacimiento' => $request->fecha_nacimiento,
      'sexo' => $request->sexo,
      'precio' => $request->precio,
      'observaciones' => $request->observaciones,
      'condiciones' => $request->condiciones,
      'cantidad' => $request->cantidad,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $animal = new AnimalVenta();

      $animal->edad = $request->input('edad');
      $animal->peso = $request->input('peso');
      $animal->raza = $request->input('raza');
      $animal->fecha_nacimiento = $request->input('fecha_nacimiento');
      $animal->sexo = $request->input('sexo');
      $animal->cantidad = $request->input('cantidad');
      $animal->precio = $request->input('precio');
      $animal->observaciones = $request->input('observaciones');
      $animal->condiciones = $request->input('condiciones');
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
      'edad' => 'required',
      'peso' => 'required',
      'raza' => 'required|string|min:3|max:255',
      'fecha_nacimiento' => 'required',
      'sexo' => 'required',
      'precio' => 'required|numeric',
      'observaciones' => 'required|string|min:3|max:255',
      'condiciones' => 'required|string|min:3|max:255',
      'cantidad' => 'required|numeric',
    ];

    $inputs = [
      'tipo_animal' => $request->tipo_animal,
      'edad' => $request->edad,
      'peso' => $request->peso,
      'raza' => $request->raza,
      'fecha_nacimiento' => $request->fecha_nacimiento,
      'sexo' => $request->sexo,
      'precio' => $request->precio,
      'observaciones' => $request->observaciones,
      'condiciones' => $request->condiciones,
      'cantidad' => $request->cantidad,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $animal->edad = $request->input('edad');
      $animal->peso = $request->input('peso');
      $animal->raza = $request->input('raza');
      $animal->fecha_nacimiento = $request->input('fecha_nacimiento');
      $animal->sexo = $request->input('sexo');
      $animal->precio = $request->input('precio');
      $animal->observaciones = $request->input('observaciones');
      $animal->condiciones = $request->input('condiciones');
      $animal->cantidad = $request->input('cantidad');
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

  public function get_solicitar_ventas()
  {
    $animales = AnimalVenta::all();
    if (!Session::has('detalles_solicitud') || !Session::has('detalles_solicitud_descripcion')) {
      Session::forget("detalles_solicitud");
      Session::forget("detalles_solicitud_descripcion");
      Session::put("detalles_solicitud",[]);
      Session::put("detalles_solicitud_descripcion",[]);
    }

    $detalles = Session::get('detalles_solicitud_descripcion');
    return view('procesos.venta.index', ['animales'=>$animales,'detalles'=>$detalles]);
  }

  public function solicitar_ventas(Request $request)
  {
      $det_solicitud = new DetVenta();

      $det_solicitud->animal_venta()->associate($request->input('animal_venta_id'));

      $detalle = Session::get("detalles_solicitud");
      $detalle_descripcion = Session::get("detalles_solicitud_descripcion");

      $conteo = count($detalle) + 1;
      $conteo2 = count($detalle_descripcion) + 1;

      Session::push("detalles_solicitud",[$conteo=>$det_solicitud]);
      Session::push("detalles_solicitud_descripcion",[$conteo2=>$det_solicitud->animal_venta]);


      return response()->json(Session::get("detalles_solicitud_descripcion"));

  }

  public function solicitar_limpiar_todo()
  {
    $resultado = false;

    if (Session::has('detalles_solicitud') || Session::has('detalles_solicitud_descripcion')) {
      Session::forget("detalles_solicitud");
      Session::forget("detalles_solicitud_descripcion");

      $resultado = true;
    }

    return response()->json($resultado);
  }

  public function solicitar_limpiar_individual(Request $request)
  {
    $id_detalle = $request->input('detalle_solicitud_id');

    $detalle = Session::get("detalles_solicitud");
    $detalle_descripcion = Session::get("detalles_solicitud_descripcion");
    Session::forget("detalles_solicitud");
    Session::forget("detalles_solicitud_descripcion");
    Session::put("detalles_solicitud",[]);
    Session::put("detalles_solicitud_descripcion",[]);
    foreach ($detalle_descripcion as $id => $arreglo_detalles_descripcion) {
      foreach ($arreglo_detalles_descripcion as $key => $detalle) {
        if($key != $id_detalle) {
          Session::push("detalles_solicitud_descripcion",[$key=>$detalle]);
        }
      }
    }

    foreach ($detalle as $id => $arreglo_detalles) {
      foreach ($arreglo_detalles as $key => $detalle) {
        if($key != $id_detalle) {
          Session::push("detalles_solicitud",[$key=>$detalle]);
        }
      }
    }

    return response()->json(Session::get("detalles_solicitud_descripcion"));
  }

  public function finalizar_solicitar_ventas(Request $request)
  {
      $reglas = [
        'cedula' => 'required|numeric|min:7',
        'sexo' => 'required',
        'nombre' => 'required|string|min:3|max:255',
        'apellidos' => 'required|string|min:3|max:255',
        'telefono' => 'required|string|min:3|max:255',
        'correo' => 'required|email',
        'direccion' => 'required|string|min:3|max:255',
        'observaciones' => 'nullable|sometimes|string|min:3|max:255',
      ];

      $validator = Validator::make($request->all(), $reglas);
      if($validator->fails()){
        return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
      }else{
        $enc_solicitud = new EncVenta();
        $enc_solicitud->cedula = $request->input('cedula');
        $enc_solicitud->sexo = $request->input('sexo');
        $enc_solicitud->nombre = $request->input('nombre');
        $enc_solicitud->apellidos = $request->input('apellidos');
        $enc_solicitud->telefono = $request->input('telefono');
        $enc_solicitud->correo = $request->input('correo');
        $enc_solicitud->direccion = $request->input('direccion');
        $enc_solicitud->observaciones = $request->input('observaciones');
        $enc_solicitud->save();

        if (Session::has('detalles_solicitud') && Session::has('detalles_solicitud_descripcion')) {
          $detalles = Session::get('detalles_solicitud');
          foreach ($detalles as $arreglo_detalles) {
            foreach ($arreglo_detalles as $detalle) {
              $detalle->enc_solicitud()->associate($enc_solicitud);
              $detalle->save();
            }
          }
          $request->session()->forget('detalles_solicitud');
          $request->session()->forget('detalles_solicitud_descripcion');
        }

        Mail::to($enc_solicitud->correo)->send(new SolicitudVentaCliente($enc_solicitud));
        Mail::to("alexandervillalobos50@gmail.com")->send(new SolicitudVentaGerente($enc_solicitud));

        return response()->json($enc_solicitud);
      }
  }
}
