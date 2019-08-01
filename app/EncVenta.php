<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EncVenta extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['cedula','nombre','apellidos','direccion','telefono','correo','sexo','observaciones'];

 /**
 * Metodos de relacion.
 */
  public function detalles_venta(){
    return $this->hasMany('App\DetVenta');
  }
}
