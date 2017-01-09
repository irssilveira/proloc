<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class TabelaPrecoFrete extends Model
{
    protected $table = "tabela_preco";
    protected $fillable = [
        'responsavel',
        'preco_frete',
        'hora_munk',
        'unidade_id'
    ];
}
