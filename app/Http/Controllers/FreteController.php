<?php

namespace proloc\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use proloc\Models\Frete;
use Illuminate\Support\Facades\Validator;
use proloc\Models\TabelaPrecoFrete;

class FreteController extends Controller
{

    private $frete;
    private $precoFrete;
    public function __construct(TabelaPrecoFrete $precoFrete,Frete $frete){
        $this->frete = $frete;
        $this->precoFrete = $precoFrete;
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
            'observacao_fechamento'                     =>  $campo['observacao_fechamento'],
            'hora_munk'                                 =>  $campo['hora_munk']

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
            $salvaFechamento->hora_munk = $fechamentoData['hora_munk'];

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
            'mapa_abertura'                     => $campo['mapa_abertura'],
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

    public function totalFrete(){
        $freteTotais = $this->frete->where('user_id',auth()->user()->id)->orderBy('created_at','asc')->paginate(20);
        return view('fretes.relatorio_frete_usuario',compact('freteTotais'));
    }

    public function freteInterno($id){
        $freteInterno = $this->frete->find($id);
        return view('fretes.frete_interno',compact('freteInterno'));
    }

    public function freteDesativa(Request $request ,$id){
        $freteAchado = $this->frete->find($id);

        if($freteAchado->ativo == 1){
            $freteAchado->ativo = 0;
            $kmTotal = $freteAchado->km_fechamento - $freteAchado->km_inicial;

            $valorFrete = $this->precoFrete->where('unidade_id',$freteAchado->unidade_id)->first();

            $valorTotal = $kmTotal * $valorFrete->preco_frete;

            if(isset($freteAchado->hora_munk)) {
                $horas = $freteAchado->hora_munk;

                $quebraHora = explode(":", $horas);
                //dd($quebraHora);
                $minutos = $quebraHora[0];
                if ($minutos == 0) {

                    $valorMunk = ($quebraHora[1] / 60) * $valorFrete->hora_munk;

                } elseif($minutos!=0){


                    $minutos = $minutos * 60;
                    $minutos = $minutos + $quebraHora[1];
                    $valorMunk = ($minutos / 60) * $valorFrete->hora_munk;

                }
            }else{
                $valorMunk = 0;
            }

            $freteAchado->save();
            $freteData = array(
                'contrato' => $freteAchado->contrato,
                'km_inicial' => $freteAchado->km_inicial,
                'km_fechamento' => $freteAchado->km_fechamento,
                'cliente' => $freteAchado->cliente,
                'km_total' =>  $kmTotal,
                'valor_total' => $valorTotal + $valorMunk,
                'valor_munk' => $valorMunk,
                'horas' => $freteAchado->created_at,
                'hora_total_munk' => $freteAchado->hora_munk
            );

            $emails = ['samotinho@gmail.com', 'edgar@inovarlocacoes.com.br','mauricio@inovarlocacoes.com.br','controladoria@inovarlocacoes.com.br'];
            Mail::send('emails.fechamento_frete',$freteData,function($message) use ($freteData,$emails){
                $message->from('naoresponder@proloconline.com.br', 'Proloc Online | Sistema de Gestão');
                $message->to($emails);
                $message->subject('Proloc Online enviou uma mensagem pra você!');
            });

            $request->session()->flash('alert-success','Fechado com sucesso!');
            return redirect()->route('frete.total');
        }
    }

    public function precoFrete(){
        return view('admin.tabela_preco');
    }

    public function precoFreteTodos(){
        $precoFrete = $this->precoFrete->where('unidade_id',Session::get('unidade_id'))->get();
        return view('admin.relatorio_preco_frete',compact('precoFrete'));

    }

    public function salvarPrecoFrete(Request $request){

        $existePrecoFrete = $this->precoFrete->first();
        if(isset($existePrecoFrete)){
            $request->session()->flash('alert-error','Existe um valor já salvo!');
        }else{
            $precoFrete = $this->precoFrete->fill($request->all());
            $precoFrete->preco_frete = str_replace(",",".",str_replace(".","",$precoFrete->preco_frete));
            $precoFrete->hora_munk = str_replace(",",".",str_replace(".","",$precoFrete->hora_munk));
            $precoFrete->unidade_id = Session::get('unidade_id');
            $precoFrete->responsavel = auth()->user()->name;
            $precoFrete->save();
            $request->session()->flash('alert-success','Cadastrado com sucesso!');
            return redirect()->route('frete.preco.total');
        }

    }

    public function updatePrecoFrete($id){
        $freteUpdate = $this->precoFrete->find($id);
        return view('fretes.tabela_interna_frete',compact('freteUpdate'));
    }
    public function editPrecoFrete(Request $request,$id){
        $frete = $this->precoFrete->find($id);
        $frete->responsavel = Input::get('responsavel');
        $frete->unidade_id = Input::get('unidade_id');
        $frete->preco_frete = str_replace(",",".",str_replace(".","",Input::get('preco_frete')));
        $frete->hora_munk = str_replace(",",".",str_replace(".","",Input::get('hora_munk')));
        $frete->save();
        return redirect()->route('frete.preco.total');

    }
}
