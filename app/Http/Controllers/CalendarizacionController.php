<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use App\Cita;
use App\Paciente;
use Calendar;
use App\User;
use App\TipoServicio;
use Auth;

class CalendarizacionController extends Controller
{
  public function getCitas(){
    $servicios = TipoServicio::all();
    return view('procesos.calendarizacion.index', ['servicios'=>$servicios]);
}

public function index(){
              $events = [];
              $data = Cita::all();
              if($data->count()) {
                  foreach ($data as $key => $value) {
                      $events[] = Calendar::event(
                          $value->user->nombre . ' ' . $value->user->apellidos,
                          true,
                          new \DateTime($value->fecha),
                          new \DateTime($value->fecha),
                          $value->id,
                          [
                            'color' =>  ($value->coordinado)?'#0f9f97':'rgb(220, 53, 69)',
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

public function postRegistrarCita(Request $request){
  $this->validate($request,[
        'fecha' => 'required',
        'horaInicio' => 'required',
        'horaFinal' => 'required',
        'motivo' => 'required',
        'observaciones' => 'required',
        'tipo_servicio' => 'required',
        'paciente' => 'required',
        'estado' => 'required',
  ]);
  $paciente = Paciente::Where('id',$request->paciente)->first();
  if($request->idCita == null){
    if($request->fecha < date('Y-m-d')){
      //Alert::error('No se puede registrar una cita en una fecha menor a la actual','Error!')->autoclose(3500);
    }else{
      $cita = new Cita();
      $cita->fecha = $request->fecha;
      $cita->horaInicio = $request->horaInicio;
      $cita->horaFinal = $request->horaFinal;
      $cita->coordinado = ($request->coordinado == "1")?true:false;
      $cita->user_create_id = Auth::user()->id;
      $cita->motivo = $request->motivo;
      $cita->observaciones = $request->observaciones;
      $cita->estado = $request->estado;
      $cita->paciente()->associate($paciente);
      $cita->save();

      //Alert::success('Cita registrada correctamente!','Éxito')->autoclose(3500);
    }
  }else{
    if($request->fecha < date('Y-m-d')){
      //Alert::error('No se puede registrar una cita en una fecha menor a la actual','Error!')->autoclose(3500);
    }else{
      $cita = new Cita();
      $cita->fecha = $request->fecha;
      $cita->horaInicio = $request->horaInicio;
      $cita->horaFinal = $request->horaFinal;
      $cita->coordinado = ($request->coordinado == "1")?true:false;
      $cita->user_create_id = Auth::user()->id;
      $cita->motivo = $request->motivo;
      $cita->observaciones = $request->observaciones;
      $cita->estado = $request->estado;
      $cita->paciente()->associate($paciente);
      $cita->save();
    }
  }
  return redirect('calendarizacion/index');
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
  $cita = Cita::find($request->idCita);
  $cita->delete();

  return Response::json($cita);
}
}
