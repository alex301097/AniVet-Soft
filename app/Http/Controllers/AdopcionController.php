<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitudAdopcionGerente;
use App\Mail\SolicitudAdopcionDueño;
use App\Mail\SolicitudAdopcionAdoptante;
use App\Mail\RegistroAdopcion;
use App\EncAdopcion;
use App\DetAdopcion;
use App\EncSolicitud;
use App\DetSolicitud;
use App\TipoAnimal;
use Session;

class AdopcionController extends Controller
{
  public function get_registrar_adopciones()
  {
    if (!Session::has('detalles_adopcion')) {
      Session::forget("detalles_adopcion");
      Session::put("detalles_adopcion",[]);
    }

    $detalles = Session::get('detalles_adopcion');
    return view('procesos.adopcion.registrar.index',['detalles'=>$detalles]);
  }

  public function registrar_adopciones(Request $request)
  {
    $reglas = [
      'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'nombre' => 'nullable|sometimes|string|min:3|max:255',
      'edad' => 'required',
      'peso' => 'required',
      'tipo_animal' => 'required',
      'raza' => 'required|string|min:3|max:255',
      'sexo' => 'required',
      'color' => 'required|string',
      'observaciones' => 'required|string|min:3|max:255',
      'condiciones' => 'required|string|min:3|max:255',
    ];

    $validator = Validator::make($request->all(), $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $det_adopcion = new DetAdopcion();
      if($request->file('imagen') != null){
      $img = $request->file('imagen');
      $file_route = time().'_'.$img->getClientOriginalName();

      Storage::disk('imgPerfiles')->put($file_route,file_get_contents($img->getRealPath()));

      $det_adopcion->imagen = $file_route;
      }
      $det_adopcion->nombre = $request->input('nombre');
      $det_adopcion->edad = $request->input('edad');
      $det_adopcion->peso = $request->input('peso');
      $det_adopcion->tipo_animal = $request->input('tipo_animal');
      $det_adopcion->raza = $request->input('raza');
      $det_adopcion->sexo = $request->input('sexo');
      $det_adopcion->color = $request->input('color');
      $det_adopcion->condiciones = $request->input('condiciones');
      $det_adopcion->observaciones = $request->input('observaciones');

      Session::push("detalles_adopcion",$det_adopcion);

      return response()->json(Session::get("detalles_adopcion"));
    }
  }

  public function registrar_limpiar_todo()
  {
    $resultado = false;

    if (Session::has('detalles_adopcion')) {
      Session::forget("detalles_adopcion");
      Session::put("detalles_adopcion",[]);

      $resultado = true;
    }

    return response()->json($resultado);
  }

  public function registrar_limpiar_individual(Request $request)
  {
    $posicion = $request->input('posicion');

    $detalle = Session::get("detalles_adopcion");
    Session::forget("detalles_adopcion");
    Session::put("detalles_adopcion",[]);

    foreach ($detalle as $id => $detalle) {
      if($id != $posicion) {
        Session::push("detalles_adopcion",$detalle);
      }
    }
      return response()->json(Session::get('detalles_adopcion'));
  }

  public function finalizar_registrar_adopciones(Request $request)
  {
    if (!Session::has('detalles_adopcion') || empty(Session::get('detalles_adopcion')) || count(Session::get('detalles_adopcion')) == 0) {
      return Response::json(array('errors'=>array('error_vacio'=>'Para efectuar esta operación debes de agregar los animales que quieres dar en adopción a la lista.')));
    } else {
      $reglas = [
        'cedula_dueño' => 'required|numeric|min:7',
        'sexo_dueño' => 'required',
        'nombre_dueño' => 'required|string|min:3|max:255',
        'apellidos_dueño' => 'required|string|min:3|max:255',
        'telefono_dueño' => 'required|string|min:3|max:255',
        'correo_dueño' => 'required|email',
        'direccion_dueño' => 'required|string|min:3|max:255',
        'observaciones_dueño' => 'nullable|sometimes|string|min:3|max:255',
      ];

      $validator = Validator::make($request->all(), $reglas);
      if($validator->fails()){
        return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
      }else{
        $enc_adopcion = new EncAdopcion();
        $enc_adopcion->cedula_dueño = $request->input('cedula_dueño');
        $enc_adopcion->sexo_dueño = $request->input('sexo_dueño');
        $enc_adopcion->nombre_dueño = $request->input('nombre_dueño');
        $enc_adopcion->apellidos_dueño = $request->input('apellidos_dueño');
        $enc_adopcion->telefono_dueño = $request->input('telefono_dueño');
        $enc_adopcion->correo_dueño = $request->input('correo_dueño');
        $enc_adopcion->direccion_dueño = $request->input('direccion_dueño');
        $enc_adopcion->observaciones = $request->input('observaciones_dueño');
        $enc_adopcion->save();

        if (Session::has('detalles_adopcion')) {
          $detalles = Session::get('detalles_adopcion');
          foreach ($detalles as $detalle) {
            $detalle->enc_adopcion()->associate($enc_adopcion);
            $detalle->save();
          }
          $request->session()->forget('detalles_adopcion');
        }

        Mail::to($enc_adopcion->correo_dueño)->send(new RegistroAdopcion($enc_adopcion));
        Mail::to("alexandervillalobos50@gmail.com")->send(new RegistroAdopcion($enc_adopcion));

        Session::forget('detalles_adopcion');
        return response()->json($enc_adopcion);
      }
    }
  }

  public function get_solicitar_adopciones()
  {
    $adopciones = DetAdopcion::orderBy('created_at', 'desc')->paginate();
    if (!Session::has('detalles_solicitud')) {
      Session::forget("detalles_solicitud");
      Session::put("detalles_solicitud",[]);
    }

    $detalles = Session::get('detalles_solicitud');
    return view('procesos.adopcion.solicitar.index',['adopciones'=>$adopciones,'detalles'=>$detalles]);
  }

  public function solicitar_adopciones(Request $request)
  {
      if (!Session::has('detalles_solicitud')) {
        Session::forget("detalles_solicitud");
        Session::put("detalles_solicitud",[]);
      }

      $det_solicitud = new DetSolicitud();

      $det_solicitud->det_adopcion()->associate($request->input('adopcion_id'));

      $detalle = Session::get("detalles_solicitud");

      Session::push("detalles_solicitud",$det_solicitud->load('det_adopcion'));

      return response()->json(Session::get("detalles_solicitud"));
  }

  public function solicitar_limpiar_todo()
  {
    $resultado = false;

    if (Session::has('detalles_solicitud')) {

      Session::forget("detalles_solicitud");
      Session::put("detalles_solicitud",[]);

      $resultado = true;

    }

    return response()->json($resultado);
  }

  public function solicitar_limpiar_individual(Request $request)
  {
    $id_detalle = $request->input('detalle_solicitud_id');

    $detalle_solicitud = Session::get('detalles_solicitud');

    Session::forget("detalles_solicitud");
    Session::put("detalles_solicitud",[]);

    foreach ($detalle_solicitud as $key => $detalle) {
      if($detalle->det_adopcion->id != $id_detalle) {
        Session::push("detalles_solicitud",$detalle);
      }
    }

    // dd($detalle);

    return response()->json(Session::get("detalles_solicitud"));
  }

  public function finalizar_solicitar_adopciones(Request $request)
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
        $enc_solicitud = new EncSolicitud();
        $enc_solicitud->cedula = $request->input('cedula');
        $enc_solicitud->sexo = $request->input('sexo');
        $enc_solicitud->nombre = $request->input('nombre');
        $enc_solicitud->apellidos = $request->input('apellidos');
        $enc_solicitud->telefono = $request->input('telefono');
        $enc_solicitud->correo = $request->input('correo');
        $enc_solicitud->direccion = $request->input('direccion');
        $enc_solicitud->observaciones = $request->input('observaciones');
        $enc_solicitud->save();

        if (Session::has('detalles_solicitud')) {
          $detalles = Session::get('detalles_solicitud');
          foreach ($detalles as $detalle) {
            $detalle->enc_solicitud()->associate($enc_solicitud);
            $detalle->save();
            $detalle->det_adopcion()->delete();
          }
          $request->session()->forget('detalles_solicitud');
          // $encabezados_adopcion = $enc_solicitud->detalles_solicitud->pluck('enc_adopcion_id');
          // Mail::to($encabezados_adopcion)->send(new SolicitudAdopcionDueño($enc_solicitud));
        }

        Mail::to($enc_solicitud->correo)->send(new SolicitudAdopcionAdoptante($enc_solicitud));
        Mail::to("alexandervillalobos50@gmail.com")->send(new SolicitudAdopcionGerente($enc_solicitud));
        Session::forget('detalles_solicitud');
        return response()->json($enc_solicitud);
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
