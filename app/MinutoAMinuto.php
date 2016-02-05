<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class MinutoAMinuto extends Model
{
    function partido(){
        return $this->belongsTo('\futboleros\Partido');
    }
}
