<?php

namespace proloc;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;
use proloc\Models\Frete;
use proloc\Models\Unidades;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        return $this->belongsToMany(Unidades::class);
    }
    public function frete(){
        return $this->belongsTo(Frete::class,'id','user_id')->where('ativo','>',0)->take(5);
    }
}
