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
        <div class="col-md-12">
            @if(Session::has('alert-edit'))
                <div class="esconde alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-edit') !!}</em></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <input id="keywords" type="text" name="keywords" placeholder="Pesquisar..." class="form form-control" />
                <div class="input-group-btn">
                    <button class="btn btn-info">
                        <span class="lh27 glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </div>
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

                            <th>Cidade/Estado</th>
                            <th>CPF/CNPJ</th>
                            <th>Telefone</th>

                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody id="clientes">
                        @foreach($clientes as $cliente)

                            <tr>

                                <td class="vertical-middle" data-title="ID">{{$cliente->id}}</td>

                                <td data-title="Razão Social/Nome">{{$cliente->razao_social_nome}}</td>
                                <td data-title="Estado/Cidade">{{$cliente->cidade}}/{{$cliente->uf}}</td>
                                <td data-title="CPF/CNPJ">{{$cliente->cnpj_cpf}}</td>
                                @if(count($cliente->contato) > 0)
                                    <td data-title="Telefone">({{$cliente->contato->first()->operadora}}) {{$cliente->contato->first()->telefone}}</td>
                                @else
                                    <td data-title="Telefone"><label class="label label-danger">Telefone não cadastrado!</label></td>
                                @endif
                                <td  data-title="Opções" class="text-center vertical-middle">
                                    <div class="dropdown">
                                        <a href="javascript:;" class="btn  btn-primary btn-md" data-toggle="dropdown"><i class="fa fa-plus"></i></a>                        <ul class="dropdown-menu mudar-posicao pull-right">
                                            <li>
                                                <a class="verInfo" href="#informacaoCliente" data-target="informacaoCliente" data-toggle="modal" title="Informação Cliente" id="{{$cliente->id}}"><i class="fa fa-eye"></i> Ver informações</a>
                                            </li>
                                            <li>
                                                <a href="{{route('clientes.editar',['id'=>$cliente->id])}}"><i class="fa fa-fw fa-gear"></i> Editar</a>
                                            </li>

                                            <li class="divider"></li>
                                            <li>
                                                <a class="fechar" href="javascript:void(0)"><i class="fa fa-fw fa-times"></i> Fechar</a>
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
    <div class="modal fade" id="informacaoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Informação do cliente</h4>
                </div>
                <div  class="modal-body">
                    <div class="table-responsive-vertical shadow-z-1">';
                        <table id="tabela" class="table table-hover table-mc-light-blue">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                            </tr>
                            <tbody id="resultadoContato"></tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
@endsection