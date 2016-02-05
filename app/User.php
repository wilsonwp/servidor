<?php

namespace futboleros;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'email', 'password','profile_id','categoria_user_id','direccion','telefono','nickname'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    //***** Relaciones entre las Clases****//
    // Un usuario tiene un Profile
    function profile(){
        return $this->hasOne('\futboleros\profile');
    }
    //un usuario pertenece a una categoria de usuarios
    function categoria_user(){
        return $this->belongsTo('\futboleros\CategoriaUser');
    }
     //un usuario puede registrar muchos logs en el sistema
    function logs(){
        return $this->hasMany('\futboleros\Log');
    }
    function noticias(){
        return $this->hasMany('\futboleros\Noticia');
    }
    function comentarios(){
        return $this->hasMany('\futboleros\Comentario');
    }
    function hincha(){
        return $this->hasOne('\futboleros\Hincha');
    }
    function asignarValorPassword($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }
    
}
