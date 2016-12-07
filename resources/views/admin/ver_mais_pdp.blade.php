@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12 breadcrumb ">

            <div class="btn-group btn-breadcrumb">
                <a href="{{url('/')}}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i></a>
                <a href="{{route('pdp')}}" class="btn btn-info">Gerencia</a>
                <a href="#" class="btn btn-info">PDP número {{$pdp->id}}</a>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="center-block text-center">
                @if(!empty($pdp->src_mapa))
                    <a href="{{$pdp->src_mapa}}" data-lightbox="roadtrip" data-title="Ponto Partida">
                        <img class="img-responsive img-thumbnail center-block" height="200" width="200" src="{{$pdp->src_mapa}}" />
                    </a>

                    <a href="http://maps.google.com/maps?q={{$pdp->latitude}},{{$pdp->longitude}}" target="_blank" class="mb20 btn btn-success">
                        <h4 class="list-group-item-heading">Acessar o mapa</h4>
                    </a>
                @else
                    <a href="#" target="_blank" class="mb20 btn btn-success">
                        <h4 class="list-group-item-heading">Não há registro!!</h4>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Nome</h4>
                    <p class="list-group-item-text">{{$pdp->users->name}}</p>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Data</h4>
                    <p class="list-group-item-text">{{ date("d/m/Y", strtotime($pdp->created_at)) }}</p>
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