<?php

namespace proloc\Http\Controllers;
use Illuminate\Support\Facades\Session;
use proloc\Http\Requests\LeadsSaveRequest;
use proloc\Http\Requests\LeadsHistoricoSaveRequest;
use proloc\Http\Requests\LeadsEditRequest;
use proloc\Http\Requests;
use proloc\Models\Leads;
use proloc\Models\LeadsHistorico;
use DateTime;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use proloc\Models\Unidades;
use proloc\Models\User;


class LeadController extends Controller
{

    private $leads;
    private $users;
    private $unidades;
    public function __construct(Leads $leads,User $users,Unidades $unidades)
    {

        $this->leads = $leads;
        $this->users = $users;
        $this->unidades = $unidades;
    }

    //Abrir tela para adicionar novo lead
    public function novo(){

        return view('leads.leads');
    }

    //Salvar novo lead
    public function salvarNovoLeads(LeadsSaveRequest $request){

        $data = $request->all();

        $lead = Leads::create($data);

        $data_retorno = DateTime::createFromFormat('d/m/Y', $data['dataRetorno'])->format('Y-m-d');
        $mensagem = $data['mensagem'];

        LeadsHistorico::create(['lead_id' => $lead->id, 'dataRetorno' => $data_retorno, 'observacao' => $mensagem, 'usuario_id' => '1']);

        $leads = LeadsHistorico::join('leads', 'leads.id', '=', 'leads_historico.lead_id')->where('leads_historico.status', '=', 'Pendente')->orderBy('dataRetorno','asc')->paginate(30);

        $request->session()->flash('alert-success','Leads criado com sucesso');
        return redirect()->route('leads');
    }

    //Mostrar todos os leads
    public function mostrarLeads(){

        $leads = LeadsHistorico::join('leads', 'leads.id', '=', 'leads_historico.lead_id')->where('unidades_id',Session::get('unidade_id'))->where('leads_historico.status', '=', 'Pendente')->orderBy('dataRetorno','asc')->paginate(30);

        return view('leads.todosleads',compact('leads'));
    }

    public function leadsInativo(){
        $leadsInativo = LeadsHistorico::join('leads', 'leads.id', '=', 'leads_historico.lead_id')->where('unidades_id',Session::get('unidade_id'))->where('leads_historico.status', '=', 'Finalizado')->orderBy('dataRetorno','asc')->paginate(30);
        return Response::json($leadsInativo);

    }

    //Abrir a tela de editar carregando os dados do lead selecionado
    public function abrirEditeLeads($id){

        $lead = Leads::where('id', $id)->first();

        $leadhistorico1 = LeadsHistorico::where('lead_id', $id)->get();

        return view('leads.editeleads',[
            'lead' => $lead,
            'leadhistorico1' => $leadhistorico1
        ]);
    }

    //Salvar edição do leads
    public function salvarEditartLead(LeadsEditRequest $request){

        $data = $request->all();
        $user = Auth::user();

        $lead = Leads::find($data['id']);

        $lead->nome = $data['nome'];
        $lead->email = $data['email'];
        $lead->telefone = $data['telefone'];
        $lead->cidade = $data['cidade'];
        $lead->estado = $data['estado'];
        $lead->endereco = $data['endereco'];
        $lead->bairro = $data['bairro'];
        $lead->equipamento = $data['equipamento'];
        $lead->observacao = $data['observacao'];

        $lead->save();

        $lead = Leads::where('id', $data['id'])->first();
        $leadhistorico1 = LeadsHistorico::where('lead_id', $data['id'])->get();
        return view('leads.editeleads',[
            'lead' => $lead,
            'leadhistorico1' => $leadhistorico1
        ]);
    }

    //Adicionar novo historico a lead existente
    public function addHistoricoLead(Request $request){

        $data = $request->all();

        $dataRetorno = DateTime::createFromFormat('d/m/Y', $data['dataRetorno'])->format('Y-m-d');
        $mensagem = $data['mensagem'];

        $leadhistorico = LeadsHistorico::create(['lead_id' => $data['id'], 'dataRetorno' => $dataRetorno, 'observacao' => $mensagem, 'usuario_id' => Auth::user()->id]);
        return Response::json($leadhistorico);

        //$lead = Leads::where('id', $data['id'])->first();
        //$leadhistorico1 = LeadsHistorico::where('lead_id', $data['id'])->get();

        /* return view('leads.editeleads',[
            'lead' => $lead,
            'leadhistorico1' => $leadhistorico1
        ]); */
    }

    public function inativarHistoricoLead($id, $idLead){

        $lead = LeadsHistorico::find($id);

        $lead->status = 'Finalizado';

        $lead->save();

        $lead = Leads::where('id', $idLead)->first();
        $leadhistorico1 = LeadsHistorico::where('lead_id', $idLead)->get();
        return view('leads.editeleads',[
            'lead' => $lead,
            'leadhistorico1' => $leadhistorico1
        ]);
    }
}

