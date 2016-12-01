<?php

namespace proloc\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'password','tipo_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function unidade(){
        return $this->belongsToMany(Unidades::class,'unidades_user');
    }


    public function tipo(){
        return $this->hasOne(TipoUsuario::class);

    }

}
