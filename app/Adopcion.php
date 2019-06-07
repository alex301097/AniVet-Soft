<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adopcion extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['observaciones'];


    /**
     * Metodos de relacion.
     */
    public function animal_venta(){
      return $this->belongsTo('App\AnimalVenta');
    }

}
