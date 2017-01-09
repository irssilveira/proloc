@extends('principal.store')

@section('content')
    <div class="row">
        <div class="col-md-12 breadcrumb">

            <div class="btn-group btn-breadcrumb">
                <a href="{{url('/')}}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('alert-success'))
                <div class="esconde alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>

            @endif
            @if(Session::has('alert-error'))
                <div class="esconde alert alert-success"><span class="glyphicon glyphicon-remove"></span><em> {!! session('alert-error') !!}</em></div>
            @endif
        </div>
    </div>
    @if(!isset($precoFrete))
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumbProduct">
                    <a href="{{route('frete.preco')}}"><button type="button" class="form-btn btn btn-primary">Novo Valor</button></a>
                </ol>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive-vertical shadow-z-1">
                <!-- Table starts here -->
                <table  class="table table-hover table-mc-light-blue">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Preço Frete(km)</th>
                        <th>Preço Munk(hora)</th>
                        <th>Responsável</th>

                        <th>Data modificação</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody id="resultado">
                    @foreach($precoFrete as $precoRelatorio)
                        <tr>
                            <td class="vertical-middle" data-title="ID">{{$precoRelatorio->id}}</td>
                            <td data-title="Telefone">R$ {{number_format((float)$precoRelatorio->preco_frete,2,",",".")}}</td>
                            <td data-title="Endereco">R$ {{number_format((float)$precoRelatorio->hora_munk,2,",",".")}}</td>
                            <td data-title="Responsável">{{$precoRelatorio->responsavel}}</td>
                            <td  data-title="Data">{{ date("d/m/Y", strtotime($precoRelatorio->updated_at)) }}</td>
                            <td  class="text-center vertical-middle">

                                <div class="dropdown">

                                    <div class="dropdown">
                                        <a href="javascript:;" class="btn  btn-primary btn-md" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                        <ul class="dropdown-menu mudar-posicao pull-right">
                                            <li>
                                                <a href="{{route('update.frete.preco',['id'=>$precoRelatorio->id])}}"><i class="fa fa-fw fa-gear"></i>Ver mais</a>
                                            </li>

                                            <li class="divider"></li>
                                            <li>
                                                <a class="fechar" href="javascript:void(0)"><i class="fa fa-fw fa-times"></i>Fechar</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <div class="pull-left">
                    <a class="btn btn-primary btn-lg" href="javascript:window.history.go(-1)">Voltar</a>
                </div>
            </div>

        </div>
    </div>
@endsection