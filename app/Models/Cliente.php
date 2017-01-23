<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    protected $fillable = [
        'id',
        'unidade_id',
        'razao_social_nome',
        'nome_fantasia',
        'cnpj_cpf',
        'inscricao_estadual_rg',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'uf',
        'numero',
        'referencia',
        'limite',
        'forma_pagamento',
        'data_nascimento',
        'franqueado',
        'unidade_franqueado',
        'observacao',
        'cep_correspondencia',
        'endereco_correspondencia',
        'bairro_correspondencia',
        'cidade_correspondencia',
        'estado_correspondencia',
        'referencia_correspondencia',
        'data_limite_credito',
    ];

    public function contato()
    {

        return $this->hasMany(ClienteContato::class,'cliente_id','id');

    }

    public function formaPagamento(){
        return $this->belongsToMany(FormaPagamento::class,'cliente_pagamento');
    }


}
