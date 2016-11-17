<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    protected $fillable = [
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

        return $this->hasMany(ContatoCliente::class);

    }
}
