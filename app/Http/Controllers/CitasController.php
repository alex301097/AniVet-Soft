<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Auth;
use App\Cita;
use App\TipoServicio;
use App\Paciente;
use Session;

class CitasController extends Controller
{
  public function index()
  {
    $citas = Cita::orderBy('created_at', 'desc')->paginate();
    $servicios = TipoServicio::all();
    return view('mantenimientos.citas.index', ['citas'=>$citas,'servicios'=>$servicios]);
  }

  public function get_detalle_citas($id)
  {
    $cita = Cita::find($id);
    $servicios = TipoServicio::all();
    return view('mantenimientos.citas.detalle', ['cita'=>$cita,'servicios'=>$servicios]);
  }

  public function get_añadir_citas()
  {
    $servicios = TipoServicio::all();
    return view('mantenimientos.citas.registrar', ['servicios'=>$servicios]);
  }

  public function añadir_citas(Request $request)
  {
    $reglas = [
      'fecha' => 'required',
      'horaInicio' => 'required',
      'horaFinal' => 'required',
      'motivo' => 'required',
      'observaciones' => 'required',
      'estado' => 'required',
      'servicio' => 'required',
      'paciente' => 'required',
    ];

    $inputs = [
      'fecha' => $request->fecha,
      'horaInicio' => $request->horaInicio,
      'horaFinal' => $request->horaFinal,
      'motivo' => $request->motivo,
      'observaciones' => $request->observaciones,
      'estado' => $request->estado,
      'servicio' => $request->servicio,
      'paciente' => $request->paciente,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $cita = new Cita();

      $cita->fecha = $request->input('fecha');
      $cita->horaInicio = $request->input('horaInicio');
      $cita->horaFinal = $request->input('horaFinal');
      $cita->motivo = $request->input('motivo');
      $cita->observaciones = $request->input('observaciones');
      $cita->estado = $request->input('estado');
      $cita->servicio()->associate(TipoServicio::find($request->input('servicio')));
      $cita->paciente()->associate(Paciente::find($request->input('paciente')));
      $cita->user_create()->associate(Auth::user());
      $cita->save();

      return response()->json($cita);
    }
  }

  public function get_editar_citas($id)
  {
    $cita = Cita::find($id);
    $servicios = TipoServicio::all();
    return view('mantenimientos.citas.editar', ['cita'=>$cita,'servicios'=>$servicios]);
  }

  public function editar_citas(Request $request)
  {

    $cita = Cita::find($request->input('id_edicion'));

    $reglas = [
      'fecha' => 'required',
      'horaInicio' => 'required',
      'horaFinal' => 'required',
      'motivo' => 'required',
      'observaciones' => 'required',
      'estado' => 'required',
      'servicio' => 'required',
      'paciente' => 'required',
    ];

    $inputs = [
      'fecha' => $request->fecha,
      'horaInicio' => $request->horaInicio,
      'horaFinal' => $request->horaFinal,
      'motivo' => $request->motivo,
      'observaciones' => $request->observaciones,
      'estado' => $request->estado,
      'servicio' => $request->servicio,
      'paciente' => $request->paciente,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $cita->fecha = $request->input('fecha');
      $cita->horaInicio = $request->input('horaInicio');
      $cita->horaFinal = $request->input('horaFinal');
      $cita->motivo = $request->input('motivo');
      $cita->observaciones = $request->input('observaciones');
      $cita->estado = $request->input('estado');
      $cita->servicio()->associate(TipoServicio::find($request->input('servicio')));
      $cita->paciente()->associate(Paciente::find($request->input('paciente')));
      $cita->user_create()->associate(Auth::user());
      $cita->save();

      return response()->json($cita);
    }
  }

  public function eliminar_citas(Request $request)
  {
    $cita = Cita::withTrashed()->where('id', $request->input('id'))->first();
    if(!$cita->trashed()){
      $cita->delete();
      return response()->json($cita);
    }else{
      $cita->restore();
      return response()->json($cita);
    }
  }
}
