<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoServicio extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $table = 'tipo_servicios';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['descripcion'];

   /**
    * Metodos de relacion.
    */
   public function citas(){
     return $this->hasMany('App\Citas');
   }
}
