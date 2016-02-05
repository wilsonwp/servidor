<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $fillable = ['numero','campeonato_id','fecha'];
      //***** Relaciones entre las Clases****//
    //Una Jornada Pertenece a un Campeonato
    function campeonato(){
        return $this->belongsTo('\futboleros\Campeonato');
    }
    // este metodo es para los select dinamicos
    public static function get_jornadas($id){
        return Jornada::where('campeonato_id','=',$id)->get();
    }
    //Una Jornada Tiene Muchos Partidos
    function partidos(){
        return $this->hasMany('futboleros\Partido');
    }
}
?>