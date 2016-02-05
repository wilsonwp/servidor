<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class CategoriaUser extends Model
{
        //***** Relaciones entre las Clases****//
    //Una categoria de usuarios tiene muchos Usuarios
    function users(){
        return $this->hasMany('\futboleros\User');
    }
}
