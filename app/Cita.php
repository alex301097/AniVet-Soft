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
   protected $fillable = ['fecha','horaInicio','horaFinal','motivo','observaciones','estado'];


    /**
     * Metodos de relacion.
     */
    public function servicio(){
      return $this->belongsTo('App\TipoServicio');
    }

    public function paciente(){
      return $this->belongsTo('App\Paciente');
    }

    public function user_create(){
      return $this->belongsTo('App\User','user_create_id');
    }
}
