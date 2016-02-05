<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
        //***** Relaciones entre las Clases****//
    // un Estadio pertenece a un Equipo
    function equipo(){
        return $this->hasMany('\futboleros\Equipo');
    }
}
