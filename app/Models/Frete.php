<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class Frete extends Model
{
    protected $table = 'frete';
    protected  $fillable = [

        'user_id',
        'unidade_id',
        'latitude_abertura',
        'longitude_abertura',
        'mapa_abertura',
        'contrato',
        'km_inicial',
        'cliente',
        'telefone',
        'latitude_cliente',
        'longitude_cliente',
        'mapa_cliente',
        'km_cliente',
        'observacao',
        'latitude_saida_cliente',
        'longitude_saida_cliente',
        'mapa_cliente_saida',
        'km_cliente_saida',
        'observacao_saida',
        'latitude_fechamento',
        'longitude_fechamento',
        'mapa_fechamento',
        'km_fechamento',
        'observacao_fechamento',

    ];

    public function userfrete(){
        return $this->belongsTo(User::class);
    }

}

