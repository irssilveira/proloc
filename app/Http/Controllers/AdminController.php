<?php

namespace proloc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use proloc\Models\Leads;

class AdminController extends Controller
{
    private $lead;

    public function __construct(Leads $lead){
        $this->lead = $lead;
    }

    public function relatorioGeralLeads(){
        $relatorioLeads = $this->lead->where('unidades_id',Session::get('unidade_id'))->orderBy('id','desc')->paginate(20);
        return view('admin.relatorio_geral',compact('relatorioLeads'));
    }

    public function verMaisLeads($id){
        $relatorioLead = $this->lead->find($id);
        return view('admin.ver_mais',compact('relatorioLead'));
    }

}
