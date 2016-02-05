<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;
class Campeonato extends Model
{
    protected $fillable = array('nombre_campeonato', 'alias', 'num_partidos','fecha_inic','fecha_fin','path');

      //***** Relaciones entre las Clases****//
    //Un Campeonato Tiene Muchas Jornadas
    function jornadas(){
        return $this->hasMany('\futboleros\Jornada');
    }
    //Un Campeonato Tiene Muchas Equipos
    function equipos(){
        return $this->hasMany('\futboleros\Equipo');
    }
    public function partido(){
        return $this->hasMany('futboleros\Partido');
    }
    public function tabla(){
        return $this->hasOne('futboleros\Tabla');
    }

    public function setPathAttribute($path){
            if(!empty($path)){
              $name =$path->getClientOriginalName();
             $this->attributes['path'] = $name;
            Storage::disk('local')->put($name, File::get($path));  
            }
        
    }
     
}
