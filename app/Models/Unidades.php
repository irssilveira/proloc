<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    protected $table= 'unidades';
    protected  $fillable = [
        'estado_id',
        'cidade_id',
        'nome',
        'razao_social',
        'cnpj',
        'endereco',
        'bairro',
        'cep',
        'telefone',
        'celular',
        'whatsapp',
        'email',
        'tipo_id',
    ];

    public function usuario(){
        return $this->belongsToMany(User::class,'unidades_user');
    }

    public function cidade(){
        return $this->hasOne(Cidade::class,'id','cidade_id');
    }

    public function estado(){
        return $this->hasOne(Estado::class,'id','estado_id');
    }


}
