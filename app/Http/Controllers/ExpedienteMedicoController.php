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
use App\TipoAnimal;
use App\Checkeo;
use App\Paciente;
use Session;
use PDF;

class ExpedienteMedicoController extends Controller
{
  public function get_ficha_clinica()
  {
    $citas = Cita::orderBy('created_at', 'desc')->get();
    $chequeos = Checkeo::orderBy('created_at', 'desc')->get();

    return view('procesos.expediente_medico.index', ['citas'=>$citas,'chequeos'=>$chequeos]);
  }

  public function autocompletePaciente(Request $request){

    $term = $request->term;
    $results = array();

    $queries = Paciente::join('tipo_animals', 'tipo_animals.id', '=', 'pacientes.tipo_animal_id')
     ->where('pacientes.nombre', 'LIKE', '%'.$term.'%')
     ->orWhere('pacientes.raza', 'LIKE', '%'.$term.'%')
     ->orWhere('tipo_animals.descripcion', 'LIKE', '%'.$term.'%')
     ->take(5)->get();

    foreach ($queries as $key => $data)
    {
        $results[] = [ 'id' => $data->id, 'datos' => $data->load('user', 'imagenes'), 'value' => $data->nombre.' - '.$data->tipo_animal->descripcion.' ~ '.$data->raza.' - '.$data->sexo];
    }

    return Response::json($results);
  }
}
