<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['rol_id','cedula','nombre','apellidos','nacionalidad','fecha_nacimiento','sexo',
                            'edad','estado_civil','codigo','email','password','telefono','direccion'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['edad', 'descripcionRol'];

    /**
     * Accessor for Edad.
     */
    public function getEdadAttribute()
    {
      return Carbon::parse($this->attributes['fecha_nacimiento'])->age;
    }

    /**
     * Accessor for descripcion rol.
     */
    public function getDescripcionRolAttribute()
    {
      return $this->rol->descripcion;
    }

    //Permisos
    public function tieneAcceso(array $permissions){
      // foreach($this->tipoUsuario as $tipoUsuario){
      //   if($tipoUsuario->tieneAcceso($permissions)){
      //     return true;
      //   }
      // }
      if($this->rol->tieneAcceso($permissions)){
        return true;
      }
      return false;
    }

    public function tieneRol($descripcion){
      return $this->rol()->where('descripcion',$descripcion)->count()==1;
    }

    /**
     * Metodos de relacion.
     */
    public function rol(){
      return $this->belongsTo('App\Rol');
    }
}
