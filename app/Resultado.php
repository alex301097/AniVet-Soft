<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resultado extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['analisis','diagnostico','tratamiento','recomendaciones'];

    /**
     * Metodos de relacion.
     */
    public function cita(){
      return $this->belongsTo('App\Cita');
    }
}
