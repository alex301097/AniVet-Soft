<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EncAdopcion extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['cedula_dueño','nombre_dueño','apellidos_dueño','direccion_dueño','telefono_dueño','correo_dueño','sexo_dueño','observaciones'];

 /**
 * Metodos de relacion.
 */
  public function detalles_adopcion(){
    return $this->hasMany('App\DetAdopcion');
  }

}
