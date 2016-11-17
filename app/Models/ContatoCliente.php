<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class ContatoCliente extends Model
{
    protected $table = "contato_cliente";

    protected $fillable =[
        'user_id',
        'telefone',
        'operadora',
        'cargo',
        'contato',
        'email',
        'principal'
    ];

    public function cliente(){
        return $this->belongsTo(ContatoCliente::class);
    }
}
