<?php

namespace proloc\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use proloc\Models\Frete;
use Illuminate\Support\Facades\Validator;

class FreteController extends Controller
{

    private $frete;

    public function __construct(Frete $frete){
        $this->frete = $frete;
    }

    public function novo(){
        $frete = $this->frete->create();

        return redirect()->route('frete.controle', ['id' => $frete->id]);
    }

    public function freteControle($id){
        $frete = $this->frete->find($id);

        return view('fretes.novo',compact('frete'));
    }

    public function freteFechamento(){
        $inputData = Input::get('formData');
        parse_str($inputData,$campo);
        $fechamentoData = array(

            'frete_id'                                  =>  $campo['frete_id'],
            'latitude_fechamento'                       =>  $campo['latitude_fechamento'],
            'longitude_fechamento'                      =>  $campo['longitude_fechamento'],
            'mapa_fechamento'                           =>  $campo['mapa_fechamento'],
            'km_fechamento'                             =>  $campo['km_fechamento'],
            'observacao_fechamento'                     =>  $campo['observacao_fechamento']

        );
        $regras = array(
            'km_fechamento' => 'required',

        );
        $validator = Validator::make($fechamentoData,$regras);
        if($validator->fails()){
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            $salvaFechamento = $this->frete->find($fechamentoData['frete_id']);
            $salvaFechamento->latitude_fechamento = $fechamentoData['latitude_fechamento'];
            $salvaFechamento->longitude_fechamento = $fechamentoData['longitude_fechamento'];
            $salvaFechamento->mapa_fechamento = $fechamentoData['mapa_fechamento'];

            $salvaFechamento->km_fechamento = $fechamentoData['km_fechamento'];
            $salvaFechamento->observacao_fechamento = $fechamentoData['observacao_fechamento'];

            if($salvaFechamento->save()){
                return Response::json(array(
                    'success' => true,
                    'salvaFechamento' => $salvaFechamento
                ));
            }

        }
    }
    public function freteSaidaCliente(){
        $inputData = Input::get('formData');
        parse_str($inputData,$campo);
        $saidaData = array(

            'frete_id'                                 =>  $campo['frete_id'],
            'latitude_saida_cliente'                   =>  $campo['latitude_saida_cliente'],
            'longitude_saida_cliente'                  =>  $campo['longitude_saida_cliente'],
            'mapa_cliente_saida'                       =>  $campo['mapa_cliente_saida'],
            'km_cliente_saida'                         =>  $campo['km_cliente_saida'],
            'observacao_saida'                         =>  $campo['observacao_saida']

        );
        $regras = array(
            'km_cliente_saida' => 'required',

        );
        $validator = Validator::make($saidaData,$regras);
        if($validator->fails()){
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{

            $salvaSaida = $this->frete->find($saidaData['frete_id']);

            $salvaSaida->latitude_saida_cliente = $saidaData['latitude_saida_cliente'];
            $salvaSaida->longitude_saida_cliente = $saidaData['longitude_saida_cliente'];
            $salvaSaida->mapa_cliente_saida = $saidaData['mapa_cliente_saida'];

            $salvaSaida->km_cliente_saida = $saidaData['km_cliente_saida'];
            $salvaSaida->observacao_saida = $saidaData['observacao_saida'];

            if($salvaSaida->save()){
                return Response::json(array(
                    'success' => true,
                    'saidaData' => $salvaSaida
                ));
            }

        }
    }
    public function freteChegadaCliente(){
        $inputData = Input::get('formData');
        parse_str($inputData,$campo);
        $chegadaData = array(

            'frete_id'                           =>  $campo['frete_id'],
            'latitude_cliente'                   =>  $campo['latitude_cliente'],
            'longitude_cliente'                  =>  $campo['longitude_cliente'],
            'mapa_cliente'                       =>  $campo['mapa_cliente'],
            'km_cliente'                         =>  $campo['km_cliente'],
            'observacao'                         =>  $campo['observacao']

        );
        $regras = array(
            'km_cliente' => 'required',

        );
        $validator = Validator::make($chegadaData,$regras);
        if($validator->fails()){
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{

            $salvaChegada = $this->frete->find($chegadaData['frete_id']);

            $salvaChegada->latitude_cliente = $chegadaData['latitude_cliente'];
            $salvaChegada->longitude_cliente = $chegadaData['longitude_cliente'];
            $salvaChegada->mapa_cliente = $chegadaData['mapa_cliente'];

            $salvaChegada->km_cliente = $chegadaData['km_cliente'];
            $salvaChegada->observacao = $chegadaData['observacao'];

            if($salvaChegada->save()){
                return Response::json(array(
                    'success' => true,
                    'aberturaData' => $salvaChegada
                ));
            }

        }

    }
    public function salvarFreteAbertura(){
        $inputData = Input::get('formData');
        parse_str($inputData,$campo);
        $aberturaData = array(

            'frete_id'                          =>  $campo['frete_id'],
            'user_id'                           =>  $campo['user_id'],
            'unidade_id'                        =>  $campo['unidade_id'],
            'latitude_abertura'                 =>  $campo['latitude_abertura'],
            'longitude_abertura'                =>  $campo['longitude_abertura'],
            'mapa_abertura'                      =>  $campo['mapa_abertura'],
            'contrato'                          =>  $campo['contrato'],
            'km_inicial'                        =>  $campo['km_inicial'],
            'cliente'                           =>  $campo['cliente'],
            'telefone'                          =>  $campo['telefone'],
        );

        $regras = array(
            'unidade_id' => 'required',
            'km_inicial' => 'required'
        );

        $validator = Validator::make($aberturaData,$regras);
        if($validator->fails()){
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{
            /*
             \Mail::send('emails.abertura_frete',$aberturaData,function($message) use ($aberturaData){
                $message->from('naoresponder@proloconline.com.br', 'Proloc Online');

                $message->to('samotinho@gmail.com');
                $message->subject('Proloc Online, enviou uma mensagem para você ');
            });
            */
           $salvaFrete = $this->frete->find($aberturaData['frete_id']);
            $salvaFrete->user_id = $aberturaData['user_id'];
            $salvaFrete->unidade_id = $aberturaData['unidade_id'];
            $salvaFrete->latitude_abertura = $aberturaData['latitude_abertura'];
            $salvaFrete->longitude_abertura = $aberturaData['longitude_abertura'];
            $salvaFrete->mapa_abertura = $aberturaData['mapa_abertura'];
            $salvaFrete->contrato = $aberturaData['contrato'];
            $salvaFrete->km_inicial = $aberturaData['km_inicial'];
            $salvaFrete->cliente = $aberturaData['cliente'];
            $salvaFrete->telefone = $aberturaData['telefone'];
            if($salvaFrete->save()){
                return Response::json(array(
                   'success' => true,
                    'aberturaData' => $aberturaData
                ));
            }

        }
    }
}
