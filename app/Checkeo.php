<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkeo extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['descripcion'];

  //Metodos de relacion
  public function citas(){
    return $this->belongsToMany('App\Cita',
    'checkeo_cita',
    'checkeo_id',
    'cita_id'
    )->withPivot('descripcion')->withTimestamps();
  }
}
