<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Cita;
use App\Paciente;
use Calendar;
use App\User;
use App\TipoServicio;
use Auth;
use Session;

class CalendarizacionController extends Controller
{
  public function getCitas(){
    $servicios = TipoServicio::all();
    return view('procesos.calendarizacion.index', ['servicios'=>$servicios]);
  }

public function index(){
  $events = [];
  $data = Cita::withTrashed()->get();
  if($data->count()) {
      foreach ($data as $key => $value) {
        $color = "";
        if(!empty($value->deleted_at) || new Carbon($value->fecha) < Carbon::now()){
          $color = "rgb(220, 53, 69)";
        }

        if(empty($value->deleted_at) && new Carbon($value->fecha) >= Carbon::now() && new Carbon($value->fecha) <= Carbon::now()->addDays(4)){
          $color = "rgb(209, 111, 19)";
        }

        if(empty($value->deleted_at) && new Carbon($value->fecha) > Carbon::now()->addDays(4)){
          $color = "rgb(128, 176, 93)";
        }
        $events[] = Calendar::event(
            $value->paciente->nombre. ' - ' .$value->paciente->tipo_animal->descripcion. ' - ' .$value->paciente->raza,
            true,
            new \DateTime($value->fecha),
            new \DateTime($value->fecha),
            $value->id,
            [
              'color' =>  $color,
              'textColor' => '#ffff',
              'cita' => $value,
            ]
          );
      }
  }

  $calendar = Calendar::addEvents($events)
  ->setCallbacks([
          'eventClick' => 'function(event) {editarCita(event);}',
      ]);
  $calendar->setId('citas');
  $servicios = TipoServicio::all();
  return view('procesos.calendarizacion.index', compact(['calendar','servicios']));
}

public function postRegistrarCita(Request $request)
{
  $reglas = [
    'fecha' => 'required|after:'.Carbon::now(),
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

    $cita = ($request->id_cita == null)?new Cita():Cita::find($request->id_cita);
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
}

public function autocompletePacientes(Request $request){

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

public function deshabilitarCita(Request $request){
  $cita = Cita::find($request->id);
  $cita->delete();

  return Response::json($cita);
}
}
