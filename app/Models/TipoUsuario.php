<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';
    protected $fillable = [
        'tipo_usuario'
    ];

    public function tipoUsuario(){
        return $this->belongsTo(User::class);
    }


}
