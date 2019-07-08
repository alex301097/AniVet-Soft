<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Rol;
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
          'cedula' => 'required|unique:users,cedula|min:7|numeric',
          'nombre' => 'required|string|max:255',
          'apellidos' => 'required|string|max:255',
          'email' => 'required|unique:users,email|email|min:4|max:255',
          'password' => ['required',
                         'string',
                         'min:10',             // must be at least 10 characters in length
                         'regex:/[a-z]/',      // must contain at least one lowercase letter
                         'regex:/[A-Z]/',      // must contain at least one uppercase letter
                         'regex:/[0-9]/',      // must contain at least one digit
                         'regex:/[@$!%*#?&-]/', // must contain a special character,
                         'confirmed'],
            'politicas' => ['accepted']
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
        $rol = Rol::where('descripcion','Cliente')->first();
        return User::create([
          'rol_id' => $rol->id,
          'cedula' => $data['cedula'],
          'nombre' => $data['nombre'],
          'apellidos' => $data['apellidos'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
        ]);
    }
}
