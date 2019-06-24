<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

   /**
    * Metodos de relacion.
    */
   public function citas(){
     return $this->hasMany('App\Citas');
   }

   public function users(){
     return $this->belongsToMany('App\User');
   }
}
