@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12 breadcrumb">

            <div class="btn-group btn-breadcrumb">
                <a href="{{url('/')}}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive-vertical shadow-z-1">
                <!-- Table starts here -->
                <table  class="table table-hover table-mc-light-blue">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Local</th>
                        <th>Nome</th>
                        <th>Data de criação</th>
                        <th>Ver detalhes</th>
                    </tr>
                    </thead>
                    <tbody id="resultado">
                    @foreach($fretes as $frete)

                        <tr>

                            <td class="vertical-middle" data-title="ID">{{$frete->id}}</td>
                            @if(!empty($frete->mapa_abertura))
                                <td class="vertical-middle" data-title="Mapa">
                                    <img class="group list-group-image content-img-sugestao lazy transition-img" src="{{$frete->mapa_abertura}}" width="80" height="80" alt="titulo imagem" />
                                </td>
                            @else
                                <td class="vertical-middle" data-title="Mapa">
                                    Não houve registro
                                </td>
                            @endif

                            <td data-title="Nome">{{$frete->cliente}}</td>

                            <td  data-title="Data">{{ date("d/m/Y", strtotime($frete->created_at)) }}</td>
                            <td  class="text-center vertical-middle">

                                <div class="dropdown">

                                    <div class="dropdown">
                                        <a href="javascript:;" class="btn  btn-primary btn-md" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                        <ul class="dropdown-menu mudar-posicao pull-right">
                                            <li>
                                                <a href="{{route('geral.vermaisfrete',['id'=> $frete->id])}}"><i class="fa fa-fw fa-gear"></i>Ver mais</a>
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
            <div class="col-md-12">
                <div class="text-center">
                    {!!$fretes->render()  !!}
                </div>
            </div>

        </div>
    </div>
@endsection