<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Gol extends Model
{
	protected $fillable= ['partido_id','jugador_id','equipo_id','minuto','descripcion']; 

   public function partido(){
       return $this->belongsTo('\futboleros\Partido');
   }
   public function jugador(){
       return $this->belongsTo('\futboleros\Jugador');
   }
    public function equipo(){
       return $this->belongsTo('\futboleros\Equipo');
   }
}
