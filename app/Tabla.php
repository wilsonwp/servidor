<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
   protected $fillable= ['pt','pp','pe','pg','pj','gf','gc'];

   public function equipo(){
   	return $this->belongsTo('futboleros\Equipo');
   }
   public function campeonato(){
   	return $this->belongsTo('futboleros\Campeonato');
   }
}
