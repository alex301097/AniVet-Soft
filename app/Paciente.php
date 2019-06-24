<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Paciente extends Model
    {
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'pacientes';

    protected $fillable = ['nombre','edad','peso','fecha_nacimiento','sexo',
                           'imagen','observaciones', 'raza'];

    protected $appends = ['descripcionAnimal'];

     public function getDescripcionAnimalAttribute()
    {
     return $this->tipo_animal->descripcion;
    }

    public function user(){
     return $this->belongsTo('App\User');
    }

    public function tipo_animal(){
      return $this->belongsTo('App\TipoAnimal');
    }

    public function imagenes(){
      return $this->hasMany('App\PacienteImagen','paciente_id');
    }



}
