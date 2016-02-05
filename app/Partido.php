<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $fillable= ['estadio','equipo_visitante','equipo_local','jornada_id','nombre_arbitro','campeonato_id','estatus_partido','calidad'];
  //***** Relaciones entre las Clases****//
  // Un Partido Pertenece a Una Jornada
    function jornada(){
        return $this->belongsTo('futboleros\Jornada');
    }
    function campeonato(){
        return $this->belongsTo('\futboleros\Campeonato');
    }
    public function equipos(){
        return $this->belongsToMany('futboleros\Equipo');
    }
    public function goles(){
        return $this->hasMany('\futboleros\Gol');
    }
    public function resultados(){
        return $this->hasOne('\futboleros\Resultado');
    }
    public function comentarios(){
        return $this->hasMany('\futboleros\Comentario');
    }
    public static function get_estatus($estatus){
       $partidos= Partido::where('estatus_partido','=',$estatus)->get();
       return $partidos->toArray();
    }
    
    
}
