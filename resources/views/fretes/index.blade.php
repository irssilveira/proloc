@extends('principal.store')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumbProduct">
                <a href="{{route('clientes.novo')}}"><button type="button" class="form-btn btn btn-primary">Cadastrar Cliente</button></a>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('alert-success'))
                <div class="esconde alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            @if($clientes->count() > 0)
                <div class="table-responsive-vertical shadow-z-1">
                    <!-- Table starts here -->
                    <table id="tabela" class="table table-hover table-mc-light-blue">
                        <thead>
                        <tr>
                            <th>ID</th>

                            <th>Nome/Razão Social</th>

                            <th>Cidade</th>

                            <th>UF</th>
                            <th>Limite</th>

                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cliente)

                            <tr>

                                <td class="vertical-middle" data-title="ID">{{$cliente->id}}</td>

                                <td data-title="Razão Social">{{$cliente->razao_social}}</td>
                                <td data-title="cidade">{{$cliente->cidade}}</td>
                                <td data-title="Estado">{{$cliente->uf}}</td>
                                <td data-title="Limite">R$ {{number_format((float)$cliente->limite,2,",",".")}}</td>
                                <td  data-title="Opções" class="text-center vertical-middle">
                                    <div class="dropdown">
                                        <a href="javascript:;" class="btn  btn-primary btn-md" data-toggle="dropdown"><i class="fa fa-plus"></i></a>                        <ul class="dropdown-menu mudar-posicao pull-right">
                                            <li>
                                                <a href="{{route('clientes.editar',['id'=>$cliente->id])}}"><i class="fa fa-fw fa-gear"></i>Editar</a>                            </li>

                                            <li class="divider"></li>
                                            <li>
                                                <a class="fechar" href="javascript:void(0)"><i class="fa fa-fw fa-times"></i>Fechar</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <h2 class="text-center">Não há clientes cadastrados</h2>
            @endif
            <div class="col-md-12">
                <div class="pull-left">
                    <a class="btn btn-primary btn-lg" href="javascript:window.history.go(-1)">Voltar</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="text-center">
                    {!!$clientes->render()  !!}
                </div>
            </div>

        </div>
    </div>
@endsection