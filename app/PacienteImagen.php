<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteImagen extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['imagen'];

  public function paciente(){
    return $this->belongsTo('App\Paciente','paciente_id');
  }
}
