<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalVenta extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['nombre','edad','peso','raza','fecha_nacimiento','sexo',
                          'observaciones','precio','condiciones','estado','tipo_animal_id'];

protected $appends = ['descripcionAnimal'];

  public function getDescripcionAnimalAttribute()
  {
      return $this->tipo_animal->descripcion;
  }

    /**
     * Metodos de relacion.
     */
    public function tipo_animal(){
      return $this->belongsTo('App\TipoAnimal');
    }

    public function imagenes(){
      return $this->hasMany('App\AnimalImagen','animal_venta_id');
    }

    public function adopcion(){
      return $this->belongsTo('App\Adopcion');
    }


}
