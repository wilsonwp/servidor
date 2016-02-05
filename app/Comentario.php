<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
   protected $fillable = ['minuto','user_id','partido_id','contenido','tipo_comentario_id','titulo','equipo_calidad'];
   public function partido(){
       return $this->belongsTo('\futboleros\Partido');
   }
   public function usuario(){
       return $this->belongsTo('\futboleros\User');
   }
   public function tipoComentario(){
       return $this->belongsTo('\futboleros\TipoComentario');
   }
    
}
