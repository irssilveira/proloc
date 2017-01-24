<?php

namespace proloc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use proloc\Models\Cliente;
use proloc\Models\Frete;
use proloc\Models\Leads;
use proloc\Models\Ponto;


class AdminController extends Controller
{
    private $lead;
    private $pdp;
    private $frete;
    private $cliente;


    public function __construct(Frete $frete,Leads $lead,Ponto $pdp,Cliente $cliente){
        $this->lead = $lead;
        $this->pdp = $pdp;
        $this->frete = $frete;
        $this->cliente = $cliente;
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
        $fretes = $this->frete->where('unidade_id',Session::get('unidade_id'))->orderBy('ativo','asc')->orderBy('created_at','desc')->paginate(20);

        return view('admin.relatorio_frete',compact('fretes'));
    }

    public function verMaisFrete($id){
        $frete = $this->frete->find($id);
        return view('admin.ver_mais_frete',compact('frete'));
    }

    public function indexPrincipal(){

        if(!empty(Auth::user()->unidade->first()->pivot->unidades_id)){
           Session::put('unidade_id',Auth::user()->unidade->first()->pivot->unidades_id);
        }

        return view('principal.store');

    }

    public function fretePreco(){
        return view('admin.tabela_preco');
    }
    //Aqui pesquisa query
    public function searchQuery($query){
        $resultados = null;
        $resultados = $this->cliente->where('unidade_id',Auth::user()->unidade->first()->pivot->unidades_id)->where('razao_social_nome','LIKE',$query.'%')->orWhere('cnpj_cpf','LIKE',$query.'%')->with('contato')->distinct()->get();

        return Response::json($resultados);
       /* $resultados = null;
        $query = Input::get('keywords');
        $resultados = $this->cliente->where('unidade_id',Auth::user()->unidade->first()->pivot->unidades_id)->where('razao_social_nome','like',$query.'%')->orWhere('cnpj_cpf','like',$query.'%')->with('contato')->take(8)->distinct()->get();
        return Response::json($resultados); */
    }

}
