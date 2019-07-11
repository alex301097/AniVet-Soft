<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['fecha','horaInicio','horaFinal','motivo','observaciones','estado', 'coordinado'];

   protected $appends = ['nombrePaciente','nombreDueño','descripcionServicio'];

    public function getnombrePacienteAttribute()
     {
      return $this->paciente->nombre;
     }

   public function getnombreDueñoAttribute()
    {
     return $this->paciente->user->nombre." ".$this->paciente->user->apellidos;
    }

    public function getdescripcionServicioAttribute()
     {
      return $this->servicio->descripcion;
     }

    /**
     * Metodos de relacion.
     */
    public function servicio(){
      return $this->belongsTo('App\TipoServicio','tipo_servicio_id');
    }

    public function paciente(){
      return $this->belongsTo('App\Paciente');
    }

    public function user_create(){
      return $this->belongsTo('App\User','user_create_id');
    }
}
