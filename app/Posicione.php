<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Posicione extends Model
{
   //***** Relaciones entre las Clases****//
    //En una Posicion hay Muchos Jugadores
    function jugadors(){
        return $this->hasMany('App\Jugador');
    }
}
