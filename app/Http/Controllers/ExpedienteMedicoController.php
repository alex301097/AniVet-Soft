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
use App\Resultado;
use Session;
use PDF;

class ExpedienteMedicoController extends Controller
{
  public function get_ficha_clinica()
  {
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
      $cita = Cita::where('id', '=', $request->input('cita'))
              ->with(['paciente' => function ($data) {
                $data->with('user','imagenes');
              },'resultado','checkeos'])->first();
      // $cita = Cita::find($request->input('cita'))->load('checkeos');
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
      $citas = Cita::orderBy('horaInicio', 'desc')->where('paciente_id',$request->input('paciente'))
      ->where('fecha', Carbon::today()->format('Y-m-d'))->get();
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
      'cita' => 'required',
      'analisis' => 'required|string|min:4|max:255',
      'diagnostico' => 'required|string|min:4|max:255',
      'tratamiento' => 'required|string|min:4|max:255',
      'recomendaciones' => 'required|string|min:4|max:255',
    ];

    $inputs = [
      'cita' => $request->cita,
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

      $resultado = ($cita->resultado()->exists())?$cita->resultado:new Resultado();
      $resultado->cita()->associate($request->input('cita'));
      $resultado->analisis = $request->input('analisis');
      $resultado->diagnostico = $request->input('diagnostico');
      $resultado->tratamiento = $request->input('tratamiento');
      $resultado->recomendaciones = $request->input('recomendaciones');
      $resultado->save();

      $cita->delete();

      return response()->json($resultado);
    }
  }
}
