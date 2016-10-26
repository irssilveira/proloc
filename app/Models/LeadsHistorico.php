<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class LeadsHistorico extends Model
{
    protected $table = "leads_historico";

    protected $fillable = [
        'lead_id',
        'usuario_id',
        'dataRetorno',
        'status',
        'observacao',
    ];

    public function leadshistorico(){
        return $this->belongsTo(Leads::class,'lead_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'usuario_id','id');
    }

}
