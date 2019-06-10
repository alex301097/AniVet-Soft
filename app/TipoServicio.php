<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoServicio extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable = ['id','descripcion'];

}
