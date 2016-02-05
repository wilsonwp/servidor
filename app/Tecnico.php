<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $fillable = ['nombre','alias','nacionalidad'];
     
//***** Relaciones entre las Clases****//
    //Un Tecnico Pertenece a un Equipo
   function equipo(){
       return $this->hasMany('\futboleros\Equipo');
   }
}
