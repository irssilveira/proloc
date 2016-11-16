<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidade';
    protected  $fillable = [
        'nome',
        'url_nome',
        'estado_id'
    ];

    public function franqueacidade(){
        return $this->hasMany(Unidades::class);
    }

}
