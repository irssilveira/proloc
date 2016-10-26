<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';

    protected $fillable = [
        'uf',
        'nome'
    ];

    public function franqueaestado(){
        return $this->hasMany(Unidades::class);
    }
}
