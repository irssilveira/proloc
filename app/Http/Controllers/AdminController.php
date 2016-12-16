<?php

namespace proloc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use proloc\Models\Frete;
use proloc\Models\Leads;
use proloc\Models\Ponto;

class AdminController extends Controller
{
    private $lead;
    private $pdp;
    private $frete;


    public function __construct(Frete $frete,Leads $lead,Ponto $pdp){
        $this->lead = $lead;
        $this->pdp = $pdp;
        $this->frete = $frete;
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
    public function verMaisLPdp($id){
        $pdp = $this->pdp->find($id);
        return view('admin.ver_mais_pdp',compact('pdp'));
    }

    public function freteGeral(){
        $fretes = $this->frete->where('unidade_id',Session::get('unidade_id'))->orderBy('id','desc')->paginate(20);

        return view('admin.relatorio_frete',compact('fretes'));
    }

    public function verMaisFrete($id){
        $frete = $this->frete->find($id);
        return view('admin.ver_mais_frete',compact('frete'));
    }

}
