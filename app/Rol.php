<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

  public function users(){
    return $this->hasMany('App\User');
  }

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

}
