<?php

namespace proloc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use proloc\Http\Requests\ClienteSaveRequest;
use DateTime;
use proloc\Models\Cliente;

class ClienteController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function novo(){

        return view('clientes.clientes');
    }

    public function mostrarClientes(){
        $clientes  = $this->cliente->where('unidade_id',Session::get('unidade_id'))->orderBy('id','desc')->paginate(30);
        return view('clientes.todosclientes',compact('clientes'));
    }

    public function novoCliente(ClienteSaveRequest $request){
        $cliente = $this->cliente->fill($request->all());
        $data_nascimento = DateTime::createFromFormat('d/m/Y',$request->get('data_nascimento'))->format('Y-m-d');
        $cliente->data_nascimento = $data_nascimento;

        $request->session()->flash('alert-success','Cadastrado com sucesso!');
        $cliente->save();
        return redirect()->route('clientes');
    }


}
