<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Auth;
use App\Rol;
use App\Permiso;
use Session;

class RolController extends Controller
{
  public function index()
  {
    $roles = Rol::orderBy('created_at', 'desc')->paginate();
    return view('mantenimientos.roles.index', ['roles'=>$roles]);
  }

  public function añadir_roles(Request $request)
  {
    $reglas = [
      'descripcion' => 'required|string|min:4|max:255',
    ];
    $inputs = [
      'descripcion' => $request->descripcion,
    ];
    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $rol = new Rol();
      $rol->descripcion = $request->input('descripcion');
      $rol->save();
      return response()->json($rol);
    }
  }

  public function get_asignar_permisos($id)
  {
    $rol = Rol::find($id);
    $permisos_usuario = Permiso::where('categoria','usuarios')->get();
    $permisos_paciente = Permiso::where('categoria','pacientes')->get();
    $permisos_rol = Permiso::where('categoria','roles')->get();
    $permisos_tipo_servicio = Permiso::where('categoria','tipos de servicio')->get();
    $permisos_tipo_animal = Permiso::where('categoria','tipos de animales')->get();
    $permisos_animal_en_venta = Permiso::where('categoria','animales en venta')->get();
    $permisos_citas = Permiso::where('categoria','citas')->get();

    return view('mantenimientos.roles.asignar', ['rol'=>$rol, 'permisos_usuario'=>$permisos_usuario,'permisos_paciente'=>$permisos_paciente,
    'permisos_rol'=>$permisos_rol,'permisos_tipo_servicio'=>$permisos_tipo_servicio,'permisos_tipo_animal'=>$permisos_tipo_animal,
    'permisos_animal_en_venta'=>$permisos_animal_en_venta,'permisos_citas'=>$permisos_citas]);
  }

  public function asignar_permisos(Request $request)
  {
    $reglas = [
      'rol' => 'not_in:1',
    ];

    $inputs = [
      'rol' => $request->rol,
    ];

    $mensajes = [
      'rol.different' => 'No puedes cambiar los permisos del administrador.'
    ];

    $validator = Validator::make($inputs, $reglas, $mensajes);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $rol = Rol::find($request->input('rol'));
      $rol->permisos()->sync($request->input('permisos'));
      return response()->json($rol->permisos());
    }
  }

  public function eliminar_roles(Request $request)
  {
    $rol = Rol::withTrashed()->where('id', $request->input('id'))->first();
    if(!$rol->trashed()){
      $rol->delete();
      return response()->json($rol);
    }else{
      $rol->restore();
      return response()->json($rol);
    }
  }

  public function filtrar_roles($filtro)
  {
    if($filtro == "0" || $filtro == null){
      $rol = Rol::orderBy('created_at', 'desc')->paginate();
    }else{
      $rol = Rol::onlyTrashed()->orderBy('created_at', 'desc')->paginate();
    }
    return response()->json($rol);
  }
}
