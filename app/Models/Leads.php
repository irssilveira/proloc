<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = "leads";

    protected $fillable = [
        'unidades_id',
        'nome',
        'email',
        'telefone',
        'celular',
        'endereco',
        'bairro',
        'cidade',
        'estado',
        'sexo',
        'equipamento',
        'observacao',
    ];

    public function historico(){
        return $this->hasMany(LeadsHistorico::class,'lead_id','id');
    }

    public function unidade(){
        return $this->belongsTo(Unidades::class,'unidades_id','id');
    }

}
