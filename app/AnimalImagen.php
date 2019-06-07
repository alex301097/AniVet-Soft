<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalImagen extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['imagen'];

  public function animal_venta(){
    return $this->belongsTo('App\AnimalVenta','animal_venta_id');
  }
}
