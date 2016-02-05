<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     //***** Relaciones entre las Clases****//
    // Un profile pertenece a un usuario
  function user(){
        return $this->belongsTo('App\user');
    }
}
