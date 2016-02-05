<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
   protected $fillable= ['user_id','titulo','contenido','categoria_noticia_id'];
   
   public function user(){
       return $this->belongsTo('futboleros\User');
   }
   public function categoria(){
       return $this->belongsTo('futboleros\CategoriaNoticia');
   }
}
