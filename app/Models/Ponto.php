<?php

namespace proloc\Models;


use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    protected $table = 'ponto';
    protected  $fillable = [
        'users_id',
        'longitude',
        'latitude',
        'src_mapa'
    ];

    public function users(){
        return $this->belongsTo(User::class,'users_id','id');
    }

}
