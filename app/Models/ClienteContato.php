<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;
use proloc\User;

class ClienteContato extends Model
{
    protected $table = 'cliente_contato';
    protected  $fillable = [
        'cliente_id',
        'telefone',
        'operadora',
        'cargo',
        'contato',
        'email',
        'principal'
    ];

    public function clienteUsuario(){
       return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

}
