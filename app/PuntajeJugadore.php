<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class PuntajeJugadore extends Model
{
   //***** Relaciones entre las Clases****//
    //El puntaje Pertenece a Un Jugador en Un partido 
    function partido(){
        return $this->belongsTo('App\Partido');
    }
    function jugador(){
        return $this->belongsTo('App\Jugador');
    }
}
