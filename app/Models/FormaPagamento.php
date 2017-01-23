<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    protected  $table = "forma_pagamento";
    protected  $fillable = [
        'nome',
    ];

    public function clientePagamento(){
        return $this->belongsToMany(Cliente::class,'cliente_pagamento');
    }
}
