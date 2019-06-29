<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $table = 'permisos';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = ['descripcion','categoria'];

  //Permisos
  public function tieneAcceso(array $permissions){
    foreach($permissions as $permiso){
      if($this->tienePermiso($permiso)){
        return true;
      }
    }
    return false;
  }

  public function tienePermiso(string $permiso){
    $permisos=json_decode($this->permissions,true);
    return $permisos[$permiso]??false;
  }

  //Metodos de relacion
  public function roles(){
    return $this->belongsToMany('App\Rol',
    'permiso_rol',
    'permiso_id',
    'rol_id'
    )->withTimestamps();
  }
}
