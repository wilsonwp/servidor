<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  //***** Relaciones entre las Clases****//
    //Un log pertenece a un usuario
     function user(){
        return $this->belongsTo('App\User');
    }
}
