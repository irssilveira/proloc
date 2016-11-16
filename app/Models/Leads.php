<?php

namespace proloc\Models;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = "leads";

    protected $fillable = [
        'unidades_id',
        'nome',
        'email',
        'telefone',
        'endereco',
        'bairro',
        'cidade',
        'estado',
        'sexo',
        'equipamento',
        'observacao',
        'latitude',
        'longitude',
        'src_mapa',
    ];

    public function historico(){
        return $this->hasMany(LeadsHistorico::class,'lead_id','id');
    }

    public function unidade(){
        return $this->belongsTo(Unidades::class,'unidades_id','id');
    }

}
