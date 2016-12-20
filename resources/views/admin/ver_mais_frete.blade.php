@extends('principal.store')

@section('content')
    <div class="row">
        <div class="col-md-12 breadcrumb ">

            <div class="btn-group btn-breadcrumb">
                <a href="{{url('/')}}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i></a>
                <a href="{{route('gerencia')}}" class="btn btn-info">Gerencia</a>
                <a href="#" class="btn btn-info">Frete número {{$frete->id}}</a>

            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Relatório Frete<small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#etapa1">Etapa 1</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#etapa2">Etapa 2</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#etapa3">Etapa 3</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#etapa4">Etapa 4</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#relatorioFinal">Relatório Final</a>
                    </li>
                </ul>
            </div>
            <br />
            <div class="tab-content">
                <div id="etapa1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="center-block text-center">
                                <a href="{{$frete->mapa_abertura}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                                    <img class="img-responsive img-thumbnail center-block" height="200" width="200" src="{{$frete->mapa_abertura}}" />
                                </a>

                                <a href="http://maps.google.com/maps?q={{$frete->latitude_abertura}},{{$frete->longitude_abertura}}" target="_blank" class="mb20 btn btn-success">
                                    <h4 class="list-group-item-heading">Acessar o mapa</h4>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Nome</h4>
                                    <p class="list-group-item-text">{{$frete->cliente}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Número do contrato</h4>
                                    <p class="list-group-item-text">{{$frete->contrato}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Telefone</h4>
                                    <p class="list-group-item-text">{{$frete->telefone}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">KM Abertura</h4>
                                    <p class="list-group-item-text">{{number_format((float)$frete->km_inicial,2,".",".")}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Observação</h4>
                                    <p class="list-group-item-text">Não Possui</p>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
                <div id="etapa2" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="center-block text-center">
                                <a href="{{$frete->mapa_cliente}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                                    <img class="img-responsive img-thumbnail center-block" height="200" width="200" src="{{$frete->mapa_cliente}}" />
                                </a>

                                <a href="http://maps.google.com/maps?q={{$frete->latitude_cliente}},{{$frete->longitude_cliente}}" target="_blank" class="mb20 btn btn-success">
                                    <h4 class="list-group-item-heading">Acessar o mapa</h4>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="row">


                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">KM Cliente</h4>
                                    <p class="list-group-item-text">
                                        {{number_format((float)$frete->km_cliente,2,".",".")}}
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Observação</h4>
                                    <p class="list-group-item-text">{{$frete->observacao}}</p>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="etapa3" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="center-block text-center">
                                <a href="{{$frete->mapa_cliente_saida}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                                    <img class="img-responsive img-thumbnail center-block" height="200" width="200" src="{{$frete->mapa_cliente_saida}}" />
                                </a>

                                <a href="http://maps.google.com/maps?q={{$frete->latitude_saida_cliente}},{{$frete->longitude_saida_cliente}}" target="_blank" class="mb20 btn btn-success">
                                    <h4 class="list-group-item-heading">Acessar o mapa</h4>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">KM Cliente Saída</h4>
                                    <p class="list-group-item-text">
                                        {{number_format((float)$frete->km_cliente_saida,2,".",".")}}
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Observação</h4>
                                    <p class="list-group-item-text">{{$frete->observacao_saida}}</p>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
                <div id="etapa4" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="center-block text-center">
                                <a href="{{$frete->mapa_fechamento}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                                    <img class="img-responsive img-thumbnail center-block" height="200" width="200" src="{{$frete->mapa_fechamento}}" />
                                </a>

                                <a href="http://maps.google.com/maps?q={{$frete->latitude_fechamento}},{{$frete->longitude_fechamento}}" target="_blank" class="mb20 btn btn-success">
                                    <h4 class="list-group-item-heading">Acessar o mapa</h4>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">KM Fechamento</h4>
                                    <p class="list-group-item-text">
                                        {{number_format((float)$frete->km_fechamento,2,".",".")}}
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Observação</h4>
                                    <p class="list-group-item-text">{{$frete->observacao_fechamento}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="relatorioFinal" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">KM Total</h4>
                                    <?php $percorridoTotal = $frete->km_fechamento - $frete->km_inicial  ?>
                                    <p class="list-group-item-text">
                                        {{number_format((float)$percorridoTotal,2,".",".")}}
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Valor KM</h4>

                                    <p class="list-group-item-text">
                                        R$ 2.40
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    <h4 class="list-group-item-heading">Custo Frete Total</h4>
                                    <?php $percorridoTotal*= 2.40  ?>
                                    <p class="list-group-item-text">
                                       R$ {{number_format((float)$percorridoTotal,2,".",",")}}
                                    </p>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="ln_solid"></div>

            </div>

        </div>
    </div>
    <div class="col-md-12">
        <div class="pull-left">
            <a class="btn btn-primary btn-lg" href="javascript:window.history.go(-1)">Voltar</a>
        </div>
    </div>

@endsection