<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Franqueado extends Model
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

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function cidade(){
        return $this->hasOne(Cidade::class,'id','cidade_id');
    }

    public function estado(){
        return $this->hasOne(Estado::class,'id','estado_id');
    }

    public function tipofranquia(){
        return $this->hasOne(TipoFranquia::class,'id','tipo_id');
    }
}
