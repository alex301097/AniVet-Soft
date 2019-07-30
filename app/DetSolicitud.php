<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetSolicitud extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * Metodos de relacion.
   */

  public function enc_solicitud(){
    return $this->belongsTo('App\EncSolicitud');
  }

  public function det_adopcion(){
    return $this->belongsTo('App\DetAdopcion');
  }
}
