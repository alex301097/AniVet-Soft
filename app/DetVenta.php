<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetVenta extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * Metodos de relacion.
   */

  public function enc_solicitud(){
    return $this->belongsTo('App\EncVenta');
  }

  public function animal_venta(){
    return $this->belongsTo('App\AnimalVenta');
  }
}
