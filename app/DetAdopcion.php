<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetAdopcion extends Model
{

  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['nombre','edad','peso','raza','color','sexo', 'tipo_animal', 'cantidad', 'observaciones', 'condiciones', 'imagen'];

  /**
   * Metodos de relacion.
   */

  public function enc_adopcion(){
    return $this->belongsTo('App\Paciente');
  }

  public function det_solicitud(){
    return $this->hasOne('App\DetSolicitud');
  }
}
