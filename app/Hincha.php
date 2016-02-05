<?php

namespace futboleros;
use Carbon\Carbon;
use Storage;
use File;

use Illuminate\Database\Eloquent\Model;

class Hincha extends Model
{
   protected $fillable =['nombre','email','fecha_nacimiento','sexo','num_celular','user_id','path','equipo_id'];

   public function usuario(){
   	return $this->belongsTo('\futboleros\User');
   }
    public function equipo(){
    return $this->belongsTo('\futboleros\Equipo');
   }
   public function setPathAttribute($path){
            if(!empty($path)){
              $name =$path->getClientOriginalName();
        $this->attributes['path'] = $name;
        Storage::disk('local')->put($name, File::get($path));  
            }
        
    }

}
