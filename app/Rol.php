<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $table = 'rols';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['descripcion'];

  //Permiso
  public function tieneAcceso(array $permisos){
    foreach($permisos as $permiso){
        if($this->tienePermiso($permiso)){
          return true;
        }
      }
      return false;
  }

  public function tienePermiso(string $permiso){
    $permisos = $this->permisos()->pluck('descripcion');
    if($permisos->contains($permiso)){
      return true;
    }
    return false;
    }

  //Metodos de relacion
  public function users(){
    return $this->hasMany('App\User');
  }

  public function permisos(){
    return $this->belongsToMany('App\Permiso',
    'permiso_rol',
    'rol_id',
    'permiso_id'
    )->withTimestamps();
  }

}
