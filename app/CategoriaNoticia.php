<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class CategoriaNoticia extends Model
{
    protected $fillable= ['nombre_categoria'];

    public function noticia(){
    	return $this->hasMany('futboleros\Noticia');
    }
}
