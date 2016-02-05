<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class EquipoPartido extends Model
{
    protected $table = 'equipo_partido';
    protected $fillable= ['partido_id','equipo_id','calidad'];
}
