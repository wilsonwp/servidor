<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Arbitro extends Model
{
     protected $fillable = ['nombre','alias','nacionalidad'];
       //***** Relaciones entre las Clases****//
    //un Arbitro Pita Muchos Partidos
     function partidos(){
        return $this->hasMany('App\Partido');
    }
}
