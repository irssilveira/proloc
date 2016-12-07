@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12 breadcrumb ">

            <div class="btn-group btn-breadcrumb">
                <a href="{{url('/')}}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i></a>
                <a href="{{route('gerencia')}}" class="btn btn-info">Gerencia</a>
                <a href="#" class="btn btn-info">Relatório número {{$relatorioLead->id}}</a>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="center-block text-center">
                <a href="{{$relatorioLead->src_mapa}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                    <img class="img-responsive img-thumbnail center-block" height="200" width="200" src="{{$relatorioLead->src_mapa}}" />
                </a>

                <a href="http://maps.google.com/maps?q={{$relatorioLead->latitude}},{{$relatorioLead->longitude}}" target="_blank" class="mb20 btn btn-success">
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
                    <p class="list-group-item-text">{{$relatorioLead->nome}}</p>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Telefone</h4>
                    <p class="list-group-item-text">{{$relatorioLead->telefone}}</p>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Cidade</h4>
                    <p class="list-group-item-text">{{$relatorioLead->cidade}}</p>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Observação</h4>
                    <p class="list-group-item-text">{{$relatorioLead->observacao}}</p>
                </a>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="javascript:history.back()" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar </a>
        </div>
    </div>

@endsection