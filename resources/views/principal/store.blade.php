@extends('principal.app')
@section('left_col')
    @include('principal.left_col')
@endsection
@section('menu_header')
    @include('principal.menu_header')
@endsection
@section('content')
    <div class="container">
        <div class="row">


            <div class="col-sm-12 col-md-3 col-lg-4 col-xs-12">
                <form id="salvarPartida">


                    <input type="hidden" name="longitude" id="longitude" value="" />
                    <input type="hidden" name="latitude" id="latitude" value="" />
                    <input type="hidden" name="src_mapa" id="src_mapa" value="" />
                    <input type="hidden" name="users_id" value="{{auth()->user()->id}}">
                    <input type="hidden" id="unidade_id" name="unidade_id" value="<?=(\Session::get('unidade_id'))?>">
                    <div class="card-list purple">
                        <h3 class="title">PDP</h3>
                        <span class="glyphicon glyphicon-globe estilo-icon"></span>
                        <p>Ponto de partida.</p>
                        <input class="pega-partida" type="submit" value="Enviar" />
                    </div>

                </form>
            </div>
            <a href="#leads" data-target="#leads" data-toggle="modal" title="Leads">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">
                    <div class="card-list orange">
                        <h3 class="title">Leads</h3>
                        <span class="glyphicon glyphicon-folder-open estilo-icon"></span>


                        <p>Clica para abrir as opções</p>
                    </div>
                </div>
            </a>
            <a href="#frete" data-target="#frete" data-toggle="modal" title="Leads">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">
                    <div class="card-list green">
                        <h3 class="title">Frete</h3>
                        <i class="fa fa-truck estilo-icon" aria-hidden="true"></i>


                        <p>Clica para abrir as opções</p>
                    </div>
                </div>
            </a>

        </div>

    </div>

    <!-- area modal das opções -->
    <!-- modal frete -->
    <div class="modal fade" id="frete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h1><i class="fa fa-truck"></i> Frete</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <a class="confirmacaoLink" href="#">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                            <div class="card-list red">
                                <h3 class="title">Novo Frete</h3>
                                <span class="glyphicon glyphicon-pencil estilo-icon"></span>
                                <p>Criar novo</p>
                            </div>
                        </div>
                        </a>
                        <a href="{{route('frete.total')}}">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="card-list orange">
                                    <h3 class="title">Frete relatórios</h3>
                                    <i class="fa fa-newspaper-o estilo-icon" aria-hidden="true"></i>


                                    <p>Relatório Geral</p>
                                </div>
                            </div>
                        </a>
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

    <!-- modal leads -->
    <div class="modal fade" id="leads" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h1><i class="glyphicon glyphicon-folder-open"></i> Leads</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <a href="{{route('leads.novo')}}">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="card-list red">
                                    <h3 class="title">Novo Leads</h3>
                                    <span class="glyphicon glyphicon-pencil estilo-icon"></span>
                                    <p>Criação ou edição Leads</p>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('leads')}}">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="card-list orange">
                                    <h3 class="title">Relátorios de Leads</h3>
                                    <span class=" glyphicon glyphicon-folder-open estilo-icon"></span>


                                    <p>Relatório geral leads</p>
                                </div>
                            </div>
                        </a>
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
