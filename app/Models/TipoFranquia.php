<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class TipoFranquia extends Model
{
    protected $table= 'tipofranquia';
    protected  $fillable = [
        'nome',
    ];

    public function franqueadotipo(){
        return $this->hasMany(Unidades::class);
    }
}
