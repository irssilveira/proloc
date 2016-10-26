<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadsSaveRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Leads;
use App\Models\LeadsHistorico;
use DateTime;

class LeadController extends Controller
{

    private $leads;
    public function __construct(Leads $leads)
    {
            $this->leads = $leads;
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

        //$leads = LeadsHistorico::join('leads', 'leads.id', '=', 'leads_historico.lead_id')->orderBy('dataRetorno','asc')->paginate(30);
        //return view('admin.principal.leads',compact('leads'));

    }


    //Mostrar todos os leads
    public function mostrarLeads(){

        $leads = LeadsHistorico::join('leads', 'leads.id', '=', 'leads_historico.lead_id')->where('leads_historico.status', '=', 'Pendente')->orderBy('dataRetorno','asc')->paginate(30);

        return view('admin.principal.leads',compact('leads'));
    }

    //Abrir a tela de editar carregando os dados do lead selecionado
    public function edit($id){

        $lead = Leads::where('id', $id)->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }




    //Editar lead ja salvo
    public function editLead(Requests\LeadsEditRequest $request){

        $data = $request->all();

        $lead = Leads::find($data['id']);

        $lead->nome = $data['nome'];
        $lead->email = $data['email'];
        $lead->telefone = $data['telefone'];
        $lead->celular = $data['celular'];
        $lead->cidade = $data['cidade'];
        $lead->estado = $data['estado'];
        $lead->sexo = $data['sexo'];

        $lead->save();

        $lead = Leads::where('id', $data['id'])->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }
    //Adicionar novo historico a lead existente
    public function addHistoricoLead(Requests\LeadsHistoricoSaveRequest $request){

        $data = $request->all();

        $data_retorno = DateTime::createFromFormat('d/m/Y', $data['data_retorno'])->format('Y-m-d');
        $mensagem = $data['mensagem'];

        LeadsHistorico::create(['lead_id' => $data['id'], 'data_retorno' => $data_retorno, 'mensagem' => $mensagem]);

        $lead = Leads::where('id', $data['id'])->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }
    //Inativar historico lead
    public function inativarHistoricoLead($id, $idLead){

        $lead = LeadsHistorico::find($id);

        $lead->situacao = 0;

        $lead->save();

        $lead = Leads::where('id', $idLead)->first();

        return view('admin.principal.editLeads',[
            'lead' => $lead
        ]);
    }
}

