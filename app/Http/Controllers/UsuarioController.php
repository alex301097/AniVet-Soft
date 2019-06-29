<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Rol;
use Session;

class UsuarioController extends Controller
{
  public function index()
  {
    $usuarios = User::orderBy('created_at', 'desc')->paginate();
    $roles = Rol::all();
    return view('mantenimientos.usuarios.index', ['usuarios'=>$usuarios,'roles'=>$roles]);
  }

  public function filtrar_usuarios($filtro)
  {

    if($filtro == "0" || $filtro == null){
      $usuarios = User::orderBy('created_at', 'desc')->paginate();
    }else{
      $usuarios = User::onlyTrashed()->orderBy('created_at', 'desc')->paginate();
    }

    return response()->json($usuarios);
  }

  public function añadir_usuarios(Request $request)
  {
    $reglas = [
      'imagen' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'rol' => 'required',
      'cedula' => 'required|unique:users,cedula|min:7|numeric',
      'nombre' => 'required|string|max:255',
      'apellidos' => 'required|string|max:255',
      'nacionalidad' => 'required',
      'fecha_nacimiento' => 'required',
      'estado_civil' => 'required',
      'sexo' => 'required',
      'telefono' => 'required|numeric',
      'direccion' => 'required|string|max:255',
      'email' => 'required|unique:users,email|email|min:4|max:255',
      'codigo' => 'required|unique:users,codigo|min:4|max:255',
      'password' => ['required',
                     'string',
                     'min:10',             // must be at least 10 characters in length
                     'regex:/[a-z]/',      // must contain at least one lowercase letter
                     'regex:/[A-Z]/',      // must contain at least one uppercase letter
                     'regex:/[0-9]/',      // must contain at least one digit
                     'regex:/[@$!%*#?&-]/', // must contain a special character,
                     'confirmed']
    ];

    $inputs = [
      'imagen' => $request->imagen,
      'rol' => $request->rol,
      'cedula' => $request->cedula,
      'nombre' => $request->nombre,
      'apellidos' => $request->apellidos,
      'nacionalidad' => $request->nacionalidad,
      'fecha_nacimiento' => $request->fecha_nacimiento,
      'estado_civil' => $request->estado_civil,
      'sexo' => $request->sexo,
      'telefono' => $request->telefono,
      'direccion' => $request->direccion,
      'email' => $request->email,
      'codigo' => $request->codigo,
      'password' => $request->password,
      'password_confirmation' => $request->password_confirmation,
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $user = new User();
      if($request->file('imagen') != null){
      $img = $request->file('imagen');
      $file_route = time().'_'.$img->getClientOriginalName();

      Storage::disk('imgPerfiles')->put($file_route,file_get_contents($img->getRealPath()));

      $user->imagen = $file_route;
      }
      $user->rol()->associate($request->input('rol'));
      $user->cedula = $request->input('cedula');
      $user->nombre = $request->input('nombre');
      $user->apellidos = $request->input('apellidos');
      $user->nacionalidad = $request->input('nacionalidad');
      $user->fecha_nacimiento = $request->input('fecha_nacimiento');
      $user->estado_civil = $request->input('estado_civil');
      $user->sexo = $request->input('sexo');
      $user->telefono = $request->input('telefono');
      $user->direccion = $request->input('direccion');
      $user->email = $request->input('email');
      $user->codigo = $request->input('codigo');
      $user->password = Hash::make($request->input('password'));
      $user->save();

      return response()->json($user);
    }
  }

  public function editar_usuarios(Request $request)
  {
    $user = User::find($request->input('id_edicion'));

    $reglas = [
      'imagen_edicion' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'rol_edicion' => 'required',
      'cedula_edicion' => Rule::unique('users', 'cedula')->ignore($user->id),
      //'cedula_edicion' => 'required|unique:users,cedula|min:7|max:50|numeric',
      'nombre_edicion' => 'required|string|max:255',
      'apellidos_edicion' => 'required|string|max:255',
      'nacionalidad_edicion' => 'required',
      'fecha_nacimiento_edicion' => 'required',
      'estado_civil_edicion' => 'required',
      'sexo_edicion' => 'required',
      'telefono_edicion' => 'required|numeric',
      'direccion_edicion' => 'required|string|max:255'
    ];

    $inputs = [
      'imagen_edicion' =>  $request->imagen,
      'rol_edicion' => $request->rol_edicion,
      'cedula_edicion' => $request->cedula_edicion,
      'nombre_edicion' => $request->nombre_edicion,
      'apellidos_edicion' => $request->apellidos_edicion,
      'nacionalidad_edicion' => $request->nacionalidad_edicion,
      'fecha_nacimiento_edicion' => $request->fecha_nacimiento_edicion,
      'estado_civil_edicion' => $request->estado_civil_edicion,
      'sexo_edicion' => $request->sexo_edicion,
      'telefono_edicion' => $request->telefono_edicion,
      'direccion_edicion' => $request->direccion_edicion
    ];

    $validator = Validator::make($inputs, $reglas);
    if($validator->fails()){
      return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
    }else{
      $user->rol()->associate($request->input('rol_edicion'));
      if($request->file('imagen_edicion') != null){
      $img = $request->file('imagen_edicion');
      $file_route = time().'_'.$img->getClientOriginalName();

      Storage::disk('imgPerfiles')->delete($user->imagen);
      Storage::disk('imgPerfiles')->put($file_route,file_get_contents($img->getRealPath()));

      $user->imagen = $file_route;
      }
      $user->cedula = $request->input('cedula_edicion');
      $user->nombre = $request->input('nombre_edicion');
      $user->apellidos = $request->input('apellidos_edicion');
      $user->nacionalidad = $request->input('nacionalidad_edicion');
      $user->fecha_nacimiento = $request->input('fecha_nacimiento_edicion');
      $user->estado_civil = $request->input('estado_civil_edicion');
      $user->sexo = $request->input('sexo_edicion');
      $user->telefono = $request->input('telefono_edicion');
      $user->direccion = $request->input('direccion_edicion');
      $user->save();

      return response()->json($user);
    }
  }

  public function eliminar_usuarios(Request $request)
  {
    $user = User::withTrashed()->where('id', $request->input('id'))->first();
    if(!$user->trashed()){
      $user->delete();
      return response()->json($user);
    }else{
      $user->restore();
      return response()->json($user);
    }
  }
}
