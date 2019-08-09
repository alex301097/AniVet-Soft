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
use App\PacienteImagen;
use App\TipoServicio;
use App\TipoAnimal;
use App\Checkeo;
use App\Paciente;
use Session;
use PDF;

class ExpedienteMedicoController extends Controller
{
  public function get_ficha_clinica()
  {
    // $arreglo = Session::get("prueba");
    // foreach ($arreglo as $key => $value) {
    //   dd($value);
    // }
    $citas = Cita::orderBy('created_at', 'desc')->where('paciente_id',2)->get();
    $chequeos = Checkeo::orderBy('created_at', 'desc')->get();
    return view('procesos.expediente_medico.index', ['citas'=>$citas,'chequeos'=>$chequeos]);
  }

  public function autocompleteExpediente(Request $request){
    $reglas = [
      'cita' => 'required|exists:citas,id',
    ];

    $inputs = [
      'cita' => $request->cita,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $cita = Cita::find($request->input('cita'))->load('checkeos');
      return response()->json($cita);
    }
  }

  public function autocompleteCitas(Request $request){
    $reglas = [
      'paciente' => 'required|exists:pacientes,id',
    ];

    $inputs = [
      'paciente' => $request->paciente,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $citas = Cita::orderBy('created_at', 'desc')->where('paciente_id',$request->input('paciente'))->get();
      return response()->json($citas);
    }
  }

  public function autocompletePaciente(Request $request){

    $term = $request->term;
    $results = array();

    $queries = Paciente::join('tipo_animals', 'tipo_animals.id', '=', 'pacientes.tipo_animal_id')
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

  public function guardar_chequeos(Request $request)
  {
    $reglas = [
      'cita' => 'required',
      'chequeos' => 'required',
      'descripciones' => 'required',
      'arreglo' => 'required',
    ];

    $inputs = [
      'cita' => $request->cita,
      'chequeos' => $request->chequeos,
      'descripciones' => $request->descripciones,
      'arreglo' => $request->arreglo,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $cita = Cita::find($request->input('cita'));
      $arreglo = $request->input('arreglo');

      $nuevo_arreglo = array();
      foreach ($arreglo as $key=>$dato) {
        $chequeo = $dato['chequeo'];
        $descripcion = $dato['descripcion'];
        $nuevo_arreglo[$chequeo] = ['descripcion'=>$descripcion];
      }
      $cita->checkeos()->sync($nuevo_arreglo);

      return response()->json($cita->checkeos);
    }
  }

  public function guardar_resultados(Request $request)
  {
    $reglas = [
      'analisis' => 'required|string|min:4|max:255',
      'diagnostico' => 'required|string|min:4|max:255',
      'tratamiento' => 'required|string|min:4|max:255',
      'recomendaciones' => 'required|string|min:4|max:255',
    ];

    $inputs = [
      'analisis' => $request->analisis,
      'diagnostico' => $request->diagnostico,
      'tratamiento' => $request->tratamiento,
      'recomendaciones' => $request->recomendaciones,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $cita = Cita::find($request->input('cita'));
      $chequeos = (array) $request->input('chequeos');
      $descripciones = (array) $request->input('descripciones');

      $datos = array_combine($chequeos, $chequeos);

      foreach ($datos as $key=>$dato) {
       $cita->checkeos()->attach($key,['descripcion'=>$dato]);
      }

      return response()->json($tipo_animal);
    }
  }
}
