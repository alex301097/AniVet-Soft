<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula' => ['required','unique:users,cedula'],
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'nacionalidad' => ['required'],
            'fecha_nacimiento' => ['required'],
            'estado_civil' => ['required'],
            'sexo' => ['required'],
            'telefono' => ['required'],
            'direccion' => ['required'],
            'email' => ['required','unique:users,email','email'],
            'codigo' => ['required','unique:users,codigo'],
            'password' => ['required','min:6','confirmed'],
            'politicas' => ['accepted'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
          'rol_id' => 5,
          'cedula' => $data['cedula'],
          'nombre' => $data['nombre'],
          'apellidos' => $data['apellidos'],
          'nacionalidad' => $data['nacionalidad'],
          'fecha_nacimiento' => $data['fecha_nacimiento'],
          'estado_civil' => $data['estado_civil'],
          'sexo' => $data['sexo'],
          'telefono' => $data['telefono'],
          'direccion' => $data['direccion'],
          'email' => $data['email'],
          'codigo' => $data['codigo'],
          'password' => Hash::make($data['password']),
        ]);
    }
}
