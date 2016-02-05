<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Storage;
use File;
class Equipo extends Model


{
    protected $fillable = ['nombre_equipo','alias','fecha_fundacion','presidente_actual','nombre_hinchada','activado','campeonato_id','estadio_id','tecnico_id','nombre_estadio','path','color1','color2','color3'];
    //***** Relaciones entre las Clases****//
    //Un equipo tiene un Tecnico
    function tecnico(){
        return $this->belongsTo('\futboleros\Tecnico');
    }
    //Un Equipo pertenece a campeonato (Liga)
    function campeonato(){
        return $this->belongsTo('\futboleros\Campeonato');
    }
    //Un Equipo Tiene Muchos Juagadores
    function juagadors(){
        return $this->hasMany('\futboleros\Jugador');
    }
    //metodo para  select dinamico
    public static function get_equipos($id){
        return Equipo::where('campeonato_id','=',$id)->get();
    }
    public static function get_estadio($id){
        return Equipo::where('id','=',$id)->get();
    }
    public function partidos(){
        return $this->belongsToMany('futboleros\Partido');
    }
    public function goles(){
        return $this->hasMany('futboleros\Gol');
    }
    public function hinchas(){
        return $this->hasMany('futboleros\Hincha');
    }
     public function tabla(){
        return $this->hasMany('futboleros\Tabla');
    }
    
    public function setPathAttribute($path){
            if(!empty($path)){
              $name =$path->getClientOriginalName();
        $this->attributes['path'] = $name;
        Storage::disk('local')->put($name, File::get($path));  
            }
        
    }

}
