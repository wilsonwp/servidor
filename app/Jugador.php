<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model{
    
    protected $fillable = ['nombre','alias','fecha_nac','nacionalidad','peso','estatura','descripcion','equipo_id'];
    //***** Relaciones entre las Clases****//
    // Jugador Pertenece a un Equipo
    function equipo(){
        return $this->belongsTo('\futboleros\Equipo');
    }
    // Jugador Pertenece a una Posicion
    function posicione(){
        return $this->belongsTo('\futboleros\Posicione');
    }
    function goles(){
        return $this->hasMany('\futboleros\Gol');
    }
}