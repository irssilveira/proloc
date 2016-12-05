<?php

namespace proloc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use proloc\Models\Leads;
use proloc\Models\Ponto;

class AdminController extends Controller
{
    private $lead;
    private $pdp;

    public function __construct(Leads $lead,Ponto $pdp){
        $this->lead = $lead;
        $this->pdp = $pdp;
    }

    public function relatorioGeralLeads(){
        $relatorioLeads = $this->lead->where('unidades_id',Session::get('unidade_id'))->orderBy('id','desc')->paginate(20);
        return view('admin.relatorio_geral',compact('relatorioLeads'));
    }

    public function verMaisLeads($id){
        $relatorioLead = $this->lead->find($id);
        return view('admin.ver_mais',compact('relatorioLead'));
    }

    public function pdp(){
        $pdps = $this->pdp->where('unidade_id',Session::get('unidade_id'))->orderBy('id','dsc')->paginate(20);
        return view('admin.relatorio_pdp',compact('pdps'));
    }
}
