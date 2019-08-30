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
use PDF;

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
    $cita = Cita::withTrashed()->find($id);
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
    ];

    $inputs = [
      'fecha' => $request->fecha,
      'horaInicio' => $request->horaInicio,
      'horaFinal' => $request->horaFinal,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $rangos_ocupadas = Cita::where('fecha','=',$request->input('fecha'))->get();
      $valido = true;
      foreach ($rangos_ocupadas as $value) {
        $rango1 = Carbon::parse($value->horaInicio)->format('H:i');
        $rango2 = Carbon::parse($value->horaFinal)->format('H:i');

        $rango_nuevo1 = Carbon::parse($request->input('horaInicio'))->format('H:i');
        $rango_nuevo2 = Carbon::parse($request->input('horaFinal'))->format('H:i');

        if(($rango2 <= $rango_nuevo1) || ($rango_nuevo2 <= $rango1) && $rango_nuevo1 < $rango_nuevo2){
          $valido = true;
        }else{
          $valido = false;
          continue;
        }
      }

      if($valido){
        $reglas = [
          'fecha' => 'required|after:'.Carbon::yesterday(),
          'horaInicio' => 'required',
          'horaFinal' => 'required',
          'motivo' => 'required|string|min:4|max:255',
          'observaciones' => 'required|string|min:4|max:255',
          'servicio' => 'required',
          'paciente' => 'required',
        ];

        $inputs = [
          'fecha' => $request->fecha,
          'horaInicio' => $request->horaInicio,
          'horaFinal' => $request->horaFinal,
          'motivo' => $request->motivo,
          'observaciones' => $request->observaciones,
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
          $cita->servicio()->associate($request->input('servicio'));
          $cita->paciente()->associate($request->input('paciente'));
          $cita->user_create()->associate(Auth::user());
          $cita->save();

          return response()->json($cita);
        }
      }else{
        return Response::json(array('errors'=>array('rango_invalido'=>'El rango de hora es invalido.')));
      }
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
    $reglas = [
      'fecha' => 'required|after:'.Carbon::yesterday(),
      'horaInicio' => 'required',
      'horaFinal' => 'required',
    ];

    $inputs = [
      'fecha' => $request->fecha,
      'horaInicio' => $request->horaInicio,
      'horaFinal' => $request->horaFinal,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $rangos_ocupadas = Cita::where('fecha','=',$request->input('fecha'))->where('id', '!=', $request->input('id_edicion'))->get();

      $valido = true;
      foreach ($rangos_ocupadas as $value) {
        $rango1 = Carbon::parse($value->horaInicio)->format('H:i');
        $rango2 = Carbon::parse($value->horaFinal)->format('H:i');

        $rango_nuevo1 = Carbon::parse($request->input('horaInicio'))->format('H:i');
        $rango_nuevo2 = Carbon::parse($request->input('horaFinal'))->format('H:i');

        if(($rango2 <= $rango_nuevo1) || ($rango_nuevo2 <= $rango1) && $rango_nuevo1 < $rango_nuevo2  && $rango1 != $rango_nuevo1 && $rango2 != $rango_nuevo2 && $rango_nuevo1 < $rango_nuevo2){
          $valido = true;
        }else{
          $valido = false;
          continue;
        }
      }

      if($valido){
        $reglas = [
          'fecha' => 'required',
          'horaInicio' => 'required',
          'horaFinal' => 'required',
          'motivo' => 'required|string|min:4|max:255',
          'observaciones' => 'required|string|min:4|max:255',
          'servicio' => 'required',
          'paciente' => 'required',
        ];

        $inputs = [
          'fecha' => $request->fecha,
          'horaInicio' => $request->horaInicio,
          'horaFinal' => $request->horaFinal,
          'motivo' => $request->motivo,
          'observaciones' => $request->observaciones,
          'servicio' => $request->servicio,
          'paciente' => $request->paciente,
        ];

        $validator = Validator::make($inputs, $reglas);
        if($validator->fails()){
          return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
        }else{

          $cita = Cita::find($request->input('id_edicion'));

          $cita->fecha = $request->input('fecha');
          $cita->horaInicio = $request->input('horaInicio');
          $cita->horaFinal = $request->input('horaFinal');
          $cita->motivo = $request->input('motivo');
          $cita->observaciones = $request->input('observaciones');
          $cita->servicio()->associate($request->input('servicio'));
          $cita->paciente()->associate($request->input('paciente'));
          $cita->user_create()->associate(Auth::user());
          $cita->save();

          return response()->json($cita);
        }
      }else{
        return Response::json(array('errors'=>array('rango_invalido'=>'El rango de hora es invalido.')));
      }
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

  public function autocompletePacienteCita(Request $request){

    $term = $request->term;
    $results = array();

    $queries= Paciente::leftJoin('tipo_animals', 'tipo_animals.id', '=', 'pacientes.tipo_animal_id')
   ->where('pacientes.nombre', 'LIKE', '%'.$term.'%')
   ->orWhere('pacientes.raza', 'LIKE', '%'.$term.'%')
   ->orWhere('tipo_animals.descripcion', 'LIKE', '%'.$term.'%')
   ->take(5)->get([
        'pacientes.id as id',
        'pacientes.nombre as nombre',
        'pacientes.raza as raza',
        'pacientes.sexo as sexo',
        'tipo_animals.descripcion as tipo_animal_descripcion'
    ]);

    foreach ($queries as $key => $data)
    {
        $results[] = [ 'id' => $data->id, 'value' => $data->nombre.' - '.$data->tipo_animal_descripcion.' ~ '.$data->raza.' - '.$data->sexo];
    }

    return Response::json($results);
  }
}
