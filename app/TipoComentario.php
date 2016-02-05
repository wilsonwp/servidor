<?php

namespace futboleros;

use Illuminate\Database\Eloquent\Model;

class TipoComentario extends Model
{
    public $table = 'tipo_comentarios';
    protected $fillable = ['clase'];
    
    public function comentarios(){
        return $this->hasMany('\futboleros\Comentario');
    }
}
