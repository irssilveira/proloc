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
        <div class="col-lg-12">
            <ol class="breadcrumbProduct">
                <a href="{{route('leads.novo')}}"><button type="button" class="form-btn btn btn-primary">Novo Lead</button></a>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumbProduct">
                <a href="#" id="leadsInativos" class="btn btn-danger pull-right">Leads Inativos</a>
                <a href="#" id="leadsAtivos" class="btn btn-success pull-left">Leads Ativos</a>
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
            <div class="table-responsive-vertical shadow-z-1">
                <!-- Table starts here -->
                <table id="tabela" class="table table-hover table-mc-light-blue">
                    <thead>
                    <tr>
                        <th>ID</th>

                        <th>Data Retorno</th>

                        <th>Contato</th>

                        <th>Email</th>

                        <th>Telefone</th>
                        <th>Cidade</th>

                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody id="resultado">
                    @foreach($leads as $lead)

                        <tr>

                            <td class="vertical-middle" data-title="ID">{{$lead->id}}</td>

                            @if(strtotime('today UTC-3')<=strtotime($lead->dataRetorno))
                                <td style="background-color:#5bf98b" data-title="retorno">{{ date("d/m/Y", strtotime($lead->dataRetorno)) }}</td>
                            @else
                                <td data-title="retorno"style="background-color:#FF7D7D">{{ date("d/m/Y", strtotime($lead->dataRetorno)) }}</td>
                            @endif

                            <td data-title="nome">{{$lead->nome}}</td>
                            <td data-title="email">{{$lead->email}}</td>
                            <td data-title="telefone">{{$lead->telefone}}</td>
                            <td data-title="cidade">{{$lead->cidade}}</td>
                            <td  class="text-center vertical-middle">

                                <div class="dropdown">

                                    <a href="{{route('leads.edite',['id'=>$lead->id])}}" class="btn btn-md btn-primary"><i class="fa fa-pencil"></i></a>

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
            <div class="col-md-12">
                <div class="text-center">
                    {!!$leads->render()  !!}
                </div>
            </div>

        </div>
    </div>
@endsection