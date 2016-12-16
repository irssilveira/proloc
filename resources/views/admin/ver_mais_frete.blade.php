@extends('app')

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
    <div class="container-fluid">
        <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3"> <a href="{{$frete->mapa_abertura}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                                    <img class="img-responsive img-thumbnail center-block" height="250" width="350" src="{{$frete->mapa_abertura}}" />
                                </a></div>
                            <div class="col-md-9">
                                <h2>Etapa 1</h2>
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
                                            <h4 class="list-group-item-heading">Telefone</h4>
                                            <p class="list-group-item-text">{{$frete->telefone}}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">KM Inicial</h4>
                                            <p class="list-group-item-text">{{number_format((float)$frete->km_inicial,2,".",".")}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{$frete->mapa_cliente}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                                    <img class="img-responsive img-thumbnail center-block" height="250" width="350" src="{{$frete->mapa_cliente}}" />
                                </a></div>
                            <div class="col-md-9">
                                <h2>Etapa 2</h2>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">KM cliente</h4>
                                            <p class="list-group-item-text">{{number_format((float)$frete->km_cliente,2,".",".")}}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-8">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">Observação</h4>
                                            <p class="list-group-item-text">{{$frete->observacao}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{$frete->mapa_cliente_saida}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                                    <img class="img-responsive img-thumbnail center-block" height="250" width="350" src="{{$frete->mapa_cliente_saida}}" />
                                </a></div>
                            <div class="col-md-9">
                                <h2>Etapa 3</h2>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">KM saída cliente</h4>
                                            <p class="list-group-item-text">{{number_format((float)$frete->km_cliente_saida,2,".",".")}}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-8">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">Observação</h4>
                                            <p class="list-group-item-text">{{$frete->observacao_saida}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{$frete->mapa_fechamento}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                                    <img class="img-responsive center-block" height="250" width="350" src="{{$frete->mapa_fechamento}}" />
                                </a></div>
                            <div class="col-md-9">
                                <h2>Etapa 4</h2>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">KM Fechamento</h4>
                                            <p class="list-group-item-text">{{number_format((float)$frete->km_fechamento,2,".",".")}}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-8">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">Observação</h4>
                                            <p class="list-group-item-text">{{$frete->observacao_fechamento}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Carousel Inner -->
            <div class="controls">
                <ul class="nav">
                    <li data-target="#custom_carousel" data-slide-to="0" class="active"><a href="#"><img src="{{$frete->mapa_abertura}}" width="50" height="50"><small>Etapa 1</small></a></li>
                    <li data-target="#custom_carousel" data-slide-to="1"><a href="#"><img src="{{$frete->mapa_cliente}}" width="50" height="50"><small>Etapa 2</small></a></li>
                    <li data-target="#custom_carousel" data-slide-to="2"><a href="#"><img src="{{$frete->mapa_cliente_saida}}" width="50" height="50"><small>Etapa 3</small></a></li>
                    <li data-target="#custom_carousel" data-slide-to="3"><a href="#"><img src="{{$frete->mapa_fechamento}}" width="50" height="50"><small>Etapa 4</small></a></li>
                </ul>
            </div>
        </div>
        <!-- End Carousel -->
    </div>
    <?php $kmPercorrido = $frete->km_fechamento - $frete->km_inicial ?>
    <p class="list-group-item-text"></p>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="text-center list-group">
                <a class="list-group-item active">
                <h4 class="list-group-item-heading">KM percorrido</h4>
                     {{number_format((float)$kmPercorrido,2,".",".")}}
                </a>
            </div>
        </div>
    </div>

@endsection