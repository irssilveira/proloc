@extends('app')
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
            <a href="{{route('leads.novo')}}">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">
                    <div class="card-list red">
                        <h3 class="title">Novo Leads</h3>
                        <span class="glyphicon glyphicon-pencil estilo-icon"></span>
                        <p>Criação ou edição Leads</p>
                    </div>
                </div>
            </a>
            <a href="{{route('leads')}}">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">
                    <div class="card-list orange">
                        <h3 class="title">Relátorios Leads</h3>
                        <span class=" glyphicon glyphicon-folder-open estilo-icon"></span>


                        <p>Relatório geral leads</p>
                    </div>
                </div>
            </a>
        </div>
       <!-- <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12 col-xs-12">
                <div class="card-list green">
                    <h3 class="title">Green Tile</h3>
                    <p>Hello Green, this is a colored tile.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">
                <div class="card-list blue">
                    <h3 class="title">Blue Tile</h3>
                    <p>Hello Blue, this is a colored tile.</p>
                </div>
            </div>
        </div> -->
    </div>
@endsection