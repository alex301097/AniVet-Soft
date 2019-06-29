<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Auth;
use App\Paciente;
use App\User;
use App\TipoAnimal;
use Session;

class PacienteController extends Controller
{
  public function index()
  {
    $pacientes = Paciente::orderBy('created_at', 'desc')->paginate();
    $tipos_animales = TipoAnimal::all();
    return view('mantenimientos.pacientes.index', ['pacientes'=>$pacientes, 'tipos_animales'=>$tipos_animales]);
  }

  public function get_detalle_pacientes($id)
  {
    $paciente = Paciente::find($id);
    $tipos_animales = TipoAnimal::all();

    return view('mantenimientos.pacientes.detalle', ['paciente'=>$paciente, 'tipos_animales'=>$tipos_animales]);
  }

  public function filtrar_pacientes($filtro)
  {

    if($filtro == "0" || $filtro == null){
      $pacientes = Paciente::orderBy('created_at', 'desc')->with('tipo_animal')->paginate();
    }else{
      $pacientes = Paciente::onlyTrashed()->orderBy('created_at', 'desc')->with('tipo_animal')->paginate();
    }

    return response()->json($pacientes);
  }

  public function get_añadir_pacientes()
  {
    $tipos_animales = TipoAnimal::all();
    return view('mantenimientos.pacientes.registrar', ['tipos_animales'=>$tipos_animales]);
  }

  public function añadir_pacientes(Request $request)
  {
    $reglas = [
      'nombre' => 'required|string|min:4|max:255',
      'edad' => 'required|numeric',
      'peso' => 'required',
      'fecha_nacimiento' => 'required',
      'sexo' => 'required',
      'observaciones' => 'required|string|min:4|max:255',
      'tipo_animal' => 'required',
      'raza' => 'required|string|min:4|max:255',
      'dueño' => 'required',
    ];

    $inputs = [
      'nombre' => $request->nombre,
      'edad' => $request->edad,
      'peso' => $request->peso,
      'fecha_nacimiento' => $request->fecha_nacimiento,
      'sexo' => $request->sexo,
      'observaciones' => $request->observaciones,
      'tipo_animal' => $request->tipo_animal,
      'raza' => $request->raza,
      'dueño' => $request->dueño,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $paciente = new Paciente();

      $paciente->nombre = $request->input('nombre');
      $paciente->edad = $request->input('edad');
      $paciente->peso = $request->input('peso');
      $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
      $paciente->sexo = $request->input('sexo');
      $paciente->observaciones = $request->input('observaciones');
      $paciente->tipo_animal()->associate(TipoAnimal::find($request->input('tipo_animal')));
      $paciente->raza = $request->input('raza');
      $paciente->user()->associate($request->input('dueño'));
      $paciente->save();

      return response()->json($paciente);
    }
  }

  public function get_editar_pacientes($id)
  {
    $paciente = Paciente::find($id);
    $tipos_animales = TipoAnimal::all();
    return view('mantenimientos.pacientes.editar', ['paciente'=>$paciente,'tipos_animales'=>$tipos_animales]);
  }

  public function editar_pacientes(Request $request)
  {
    $paciente = Paciente::find($request->input('id_edicion'));

    $reglas = [
      'nombre' => 'required|string|min:4|max:255',
      'edad' => 'required',
      'peso' => 'required',
      'fecha_nacimiento' => 'required',
      'sexo' => 'required',
      'observaciones' => 'required|string|min:4|max:255',
      'tipo_animal' => 'required',
      'raza' => 'required|string|min:4|max:255',
      'dueño' => 'required',
    ];

    $inputs = [
      'nombre' => $request->nombre,
      'edad' => $request->edad,
      'peso' => $request->peso,
      'fecha_nacimiento' => $request->fecha_nacimiento,
      'sexo' => $request->sexo,
      'observaciones' => $request->observaciones,
      'tipo_animal' => $request->tipo_animal,
      'raza' => $request->raza,
      'dueño' => $request->dueño,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $paciente->nombre = $request->input('nombre');
      $paciente->edad = $request->input('edad');
      $paciente->peso = $request->input('peso');
      $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
      $paciente->sexo = $request->input('sexo');
      $paciente->observaciones = $request->input('observaciones');
      $paciente->tipo_animal()->associate($request->input('tipo_animal'));
      $paciente->raza = $request->input('raza');
      $paciente->user()->associate($request->input('dueño'));
      $paciente->save();

      return response()->json($paciente);
    }
  }

  public function eliminar_pacientes(Request $request)
  {
    $paciente = Paciente::withTrashed()->where('id', $request->input('id'))->first();
    if(!$paciente->trashed()){
      $paciente->delete();
      return response()->json($paciente);
    }else{
      $paciente->restore();
      return response()->json($paciente);
    }
  }

  public function upload_file(Request $request)
  {
    $paciente = Paciente::find($request->input('id_paciente'));
    $img = $request->file('Imagen');
    $text = "";

    if($img){
    $file_route = time().'_'.$img->getClientOriginalName();
    Storage::disk('imgPacientes')->put($file_route,file_get_contents($img->getRealPath()));

    $paciente->imagenes()->create(['imagen'=>$file_route]);

    $text = "Hecho, imagenes subidas.";
    }else{
      $text = "Error, imagenes no subidas.";
    }

    return $text;
  }

  public function autocompleteDuenno(Request $request){
    	$term = $request->term;
    	$results = array();

      $queries= User::leftJoin('rols', 'rols.id', '=', 'users.rol_id')
      ->where('rols.descripcion', 'Cliente')
      ->where('users.nombre', 'LIKE', '%'.$term.'%')
      ->orWhere('users.cedula', 'LIKE', '%'.$term.'%')
      ->take(5)->get([
        'users.id as id',
        'users.nombre as nombre',
        'users.apellidos as apellidos',
        'users.cedula as cedula'
      ]);


    	foreach ($queries as $key => $data)
    	{
    	    $results[] = [ 'id' => $data->id, 'value' => $data->nombre.' '.$data->apellidos, 'cedula' => $data->cedula];
    	}

    return Response::json($results);
  }

}
