<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoAnimal extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $table = 'tipo_animals';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['descripcion'];

   /**
    * Metodos de relacion.
    */
   public function animal_ventas(){
     return $this->hasMany('App\AnimalVenta');
   }

   public function pacientes(){
     return $this->hasMany('App\Paciente');
   }
}
