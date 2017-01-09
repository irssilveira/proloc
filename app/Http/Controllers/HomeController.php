<?php

namespace proloc\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function searchCep(){
        $cep = Input::get('cep');


        $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

        $dados['sucesso'] = (string) $reg->resultado;
        $dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
        $dados['bairro']  = (string) $reg->bairro;
        $dados['cidade']  = (string) $reg->cidade;
        $dados['estado']  = (string) $reg->uf;

        return Response::json($dados);

    }

    public function testeEmail(){


        $emails = ['samotinho@gmail.com', 'jpsilveira12@hotmail.com','edgar@inovarlocacoes.com.br'];
        Mail::send('emails.teste', ['msg' => 'hello'], function ($message) use($emails) {
            $message->from('naoresponder@proloconline.com.br', 'Proloc Online | Sistema de Gestão');

            $message->to($emails);
            $message->subject('Proloc Online enviou uma mensagem pra você!');

        });

    }

}
