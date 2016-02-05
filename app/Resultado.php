<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $fillable = ['goles_local','goles_visitante','partido_id'];

    public function partido(){
    	return $this->belongsTo('futboleros\Partido');
    }
}
