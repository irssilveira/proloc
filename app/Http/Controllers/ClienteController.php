<?php

namespace proloc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

use proloc\Http\Requests\ClienteSaveRequest;
use DateTime;
use proloc\Models\Cliente;
use proloc\Models\ClienteContato;
use proloc\Models\FormaPagamento;
use Symfony\Component\HttpKernel\Client;

class ClienteController extends Controller
{
    private $cliente;
    private $formaPagamento;
    private $clienteContato;

    public function __construct(Cliente $cliente,FormaPagamento $formaPagamento,ClienteContato $clienteContato){
        $this->cliente = $cliente;
        $this->formaPagamento = $formaPagamento;
        $this->clienteContato = $clienteContato;
    }

    public function novo(){
        $formaPagamentos = $this->formaPagamento->orderBy('nome','asc')->get();
        return view('clientes.clientes',compact('formaPagamentos'));
    }

    public function mostrarClientes(){
        $clientes  = $this->cliente->where('unidade_id',auth()->user()->unidade->first()->pivot->unidades_id)->orderBy('id','desc')->paginate(30);
        return view('clientes.todosclientes',compact('clientes'));
    }

    public function novoCliente(ClienteSaveRequest $request){
        $cliente = $this->cliente->fill($request->all());

        $clienteContato = $this->clienteContato->fill($request->all());


        $formaPagamento = $cliente->forma_pagamento;


        unset($cliente->forma_pagamento);


        $data_nascimento = DateTime::createFromFormat('d/m/Y',$request->get('data_nascimento'))->format('Y-m-d');
        $cliente->data_nascimento = $data_nascimento;
        $cliente =  $cliente->toArray();
        $clienteSalvo = Cliente::create($cliente);
        //dd($clienteSalvo->id);
        if(isset($clienteSalvo->id)){
            if(!empty($clienteContato->telefone)){

                $clienteContato->cliente_id = $clienteSalvo->id;
                $clienteContato->save();

            }
            if($formaPagamento != null) {

                $clienteSalvo->formaPagamento()->sync($formaPagamento);
            }
            $request->session()->flash('alert-success','Cadastrado com sucesso!');
            return redirect()->route('clientes');


        }else{
            return redirect()->route('clientes');
        }

    }

    public function editarCliente($id){
        $clienteUpdate = $this->cliente->find($id);
        $pagamentos = $this->formaPagamento->get();
        return view('clientes.editeclientes',compact('clienteUpdate','pagamentos'));
    }

    public function updateCliente(Request $request,$id){
        $cliente = $this->cliente->find($id);
        $idcliente = $cliente->id;

        $clienteDados = $this->cliente->fill($request->all());

        $formaPagamento = $clienteDados->forma_pagamento;
        unset($clienteDados->forma_pagamento);
        if($formaPagamento != null) {

            $cliente->formaPagamento()->sync($formaPagamento);
        }

        $clienteContato = $this->clienteContato->fill($request->all());

        if(!empty($clienteContato->telefone)) {


            $clienteContatoArray = $clienteContato->toArray();
        }


        $data_nascimento = DateTime::createFromFormat('d/m/Y',$request->get('data_nascimento'))->format('Y-m-d');
        $clienteDados->data_nascimento = $data_nascimento;
        $clienteDados = $clienteDados->toArray();
        if($this->cliente->find($id)->update($clienteDados)){
            if($this->clienteContato->where('cliente_id',$idcliente)->first() == null){

                $clienteContato->cliente_id = $idcliente;
                $clienteContato->save();
            }else{
                $this->clienteContato->where('cliente_id',$idcliente)->update($clienteContatoArray);
            }
            $request->session()->flash('alert-edit','Editado com sucesso!');
            return redirect()->route('clientes');

        }else{

            return redirect()->route('clientes');
        }



    }
    public function informacaoCliente(){
        $idCliente = Input::get('id');

        $clienteInfo = $this->cliente->where('id',$idCliente)->with('contato')->first();

        return Response::json($clienteInfo);
    }


}
