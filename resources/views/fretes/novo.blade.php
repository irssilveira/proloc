@extends('principal.store')

@section('content')
    <div class="row">
        <div class="col-md-12 breadcrumb ">

            <div class="btn-group btn-breadcrumb">
                <a href="{{url('/')}}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i></a>
                <a href="{{route('frete')}}" class="btn btn-info">Gerencia</a>
                <a href="#" class="btn btn-info">Frete número {{$frete->id}}</a>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <a href="#aberturaFrete" class="@if(!empty($frete->km_inicial))disabled @endif aberturaFrete" data-target="#aberturaFrete" data-toggle="modal" title="Abertura Frete">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12">
                    <div class="cardFreteAbertura card-list @if(!empty($frete->km_inicial))bg-cinza @else bg-inativo @endif" >
                        <h3 class="title">Registrar Frete</h3>
                        @if(!empty($frete->km_inicial))
                            <span class="iconFreteAbertura fa fa-check-square-o estilo-icon"></span>
                        @else
                            <span class="iconFreteAbertura estilo-icon fa fa-square-o"></span>

                        @endif

                        <p>Registrar Ponto</p>
                    </div>
                </div>
            </a>
            <a href="#chegadaCliente" data-target="#chegadaCliente" class="chegadaCliente @if(empty($frete->km_cliente) && empty($frete->km_inicial)) disabled @endif" data-toggle="modal"  title="Chegada Cliente">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12">
                    <div class="cardChegadaCliente card-list @if(!empty($frete->km_cliente))bg-cinza @else bg-inativo  @endif">
                        <h3 class="title">Chegada no Cliente</h3>
                        @if(!empty($frete->km_cliente))
                            <span class="iconFreteChegadaCliente fa fa-check-square-o estilo-icon"></span>
                        @else
                            <span class="iconFreteChegadaCliente estilo-icon fa fa-square-o"></span>

                        @endif

                        <p>Registrar ponto</p>
                    </div>
                </div>
            </a>
            <!-- next etapa -->
            <a href="#saidaCliente" data-target="#saidaCliente" class="saidaCliente @if(empty($frete->km_cliente)) disabled @endif" data-toggle="modal" title="Saída Cliente">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12">
                    <div class="cardSaidaCliente card-list @if(!empty($frete->km_cliente_saida))bg-cinza @else bg-inativo @endif">
                        <h3 class="title">Saída Cliente</h3>
                        @if(!empty($frete->km_cliente_saida))
                            <span class="iconFreteSaidaCliente fa fa-check-square-o estilo-icon"></span>
                        @else
                            <span class="iconFreteSaidaCliente estilo-icon fa fa-square-o"></span>

                        @endif

                        <p>Registrar ponto</p>
                    </div>
                </div>
            </a>
            <a href="#fechamentoFrete" data-target="#fechamentoFrete" class="fechamentoFrete @if(empty($frete->km_cliente)) disabled @endif" data-toggle="modal" title="Fechamento do Frete">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12">
                    <div class="cardFechamentoFrete card-list @if(!empty($frete->km_fechamento)) bg-cinza @else bg-inativo @endif">
                        <h3 class="title">Chegada</h3>
                        @if(!empty($frete->km_fechamento))
                            <span class="iconFreteFechamento fa fa-check-square-o estilo-icon"></span>
                        @else
                            <span class="iconFreteFechamento estilo-icon fa fa-square-o"></span>

                        @endif
                        <p>Registrar ponto</p>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-12">
            <div class="text-center center-block">
                <form method="post" action="{{route('frete.desativa',['id'=> $frete->id])}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button id="fecharFrete" type="submit" class="btn btn-success btn-lg">Fechar frete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- modal abertura frete -->
    @if(empty($frete->km_inicial))
        <div class="modal fade" id="aberturaFrete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title" id="myModalLabel">Abertura do Frete</h4>
                    </div>
                    <div class="modal-body">
                        <div class="hide-body">
                            <center>
                                <img class="imagemMapa img-responsive center-block borda-image" width="140" height="140" src="">
                            </center>
                            <br>
                        </div>
                        <form  id="formFreteAbertura">

                            <input type="hidden" name="frete_id" id="frete_id" value="{{$frete->id}}" />
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            <input type="hidden" name="unidade_id" value="<?=(\Session::get('unidade_id'))?>">
                            <input type="hidden" class="latitude" name="latitude_abertura" value="{{old('latitude')}}">
                            <input type="hidden" class="longitude" name="longitude_abertura" value="{{old('longitude')}}">
                            <input type="hidden" class="mapa" name="mapa_abertura" value="{{old('mapa_abertura')}}">
                            <div class="row mb10">
                                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                    <input id="contrato" required="required" name="contrato" class="form form-control col-md-7 col-xs-12" placeholder="Contrato *">
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <input type="number" id="km_inicial" maxlength="8" required="required" name="km_inicial" class="form form-control" placeholder="Informe o KM *">
                                </div>
                            </div>

                            <div class="row mb10">
                                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                    <input id="cliente" required="required" name="cliente" class="form form-control" placeholder="Informe o cliente *">
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <input id="telefone" required="required" name="telefone" class="form form-control" placeholder="Informe o telefone *" data-inputmask="'mask': '(99) 9999-9999'">
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <button id="btnSalvar" style="margin-right: auto" type="submit" class="btn btn-primary center-block btn-lg">Salvar</button>
                            </div>
                        </form>
                        <!-- Sucesso -->

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
    @endif
    @if(empty($frete->km_cliente))
        <div class="modal fade" id="chegadaCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title" id="myModalLabel">Chegada Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <div class="hide-body">
                            <center>
                                <img class="imagemMapa img-responsive center-block borda-image" width="140" height="140" src="">
                            </center>
                            <br>
                        </div>
                        <form  id="formFreteChegadaCliente">
                            <input type="hidden" name="frete_id" id="frete_id" value="{{$frete->id}}" />
                            <input type="hidden"  class="latitude"name="latitude_cliente" value="{{old('latitude_cliente')}}">
                            <input type="hidden" class="longitude" name="longitude_cliente" value="{{old('longitude_cliente')}}">
                            <input type="hidden" class="mapa" name="mapa_cliente" value="{{old('mapa_cliente')}}">
                            <div class="row mb10">
                                <div class="col-md-12 col-lg-12col-sm-12 col-xs-12">
                                    <textarea id="observacao" rows="4" required="required" name="observacao" class="form form-control col-md-7 col-xs-12" placeholder="Observação *">{{old('observacao')}}</textarea>
                                </div>

                            </div>
                            <div class="row mb10">
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <input id="km_cliente" maxlength="8" required="required" name="km_cliente" class="form form-control" placeholder="Informe o KM *">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <button id="btnSalvar" style="margin-right: auto" type="submit" class="btn btn-primary center-block btn-lg">Salvar</button>
                            </div>
                        </form>
                        <!-- Sucesso -->

                    </div>

                </div>
            </div>
        </div>
    @endif
    @if(empty($frete->km_cliente_saida))
        <div class="modal fade" id="saidaCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title" id="myModalLabel">Saída Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <div class="hide-body">
                            <center>
                                <img class="imagemMapa img-responsive center-block borda-image" width="140" height="140" src="">
                            </center>
                            <br>
                        </div>
                        <form  id="formFreteSaidaCliente">
                            <input type="hidden" name="frete_id" id="frete_id" value="{{$frete->id}}" />
                            <input type="hidden"  class="latitude"name="latitude_saida_cliente" value="{{old('latitude_saida_cliente')}}">
                            <input type="hidden" class="longitude" name="longitude_saida_cliente" value="{{old('longitude_saida_cliente')}}">
                            <input type="hidden" class="mapa" name="mapa_cliente_saida" value="{{old('mapa_cliente_saida')}}">
                            <div class="row mb10">
                                <div class="col-md-12 col-lg-12col-sm-12 col-xs-12">
                                    <textarea id="observacao" rows="4" required="required" name="observacao_saida" class="form form-control col-md-7 col-xs-12" placeholder="Observação *">{{old('observacao')}}</textarea>
                                </div>

                            </div>
                            <div class="row mb10">
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <input id="km_cliente_saida" maxlength="8" required="required" name="km_cliente_saida" class="form form-control" placeholder="Informe o KM *">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <button id="btnSalvar" style="margin-right: auto" type="submit" class="btn btn-primary center-block btn-lg">Salvar</button>
                            </div>
                        </form>
                        <!-- Sucesso -->

                    </div>

                </div>
            </div>
        </div>
    @endif


    @if(empty($frete->km_fechamento))
        <div class="modal fade" id="fechamentoFrete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title" id="myModalLabel">Fechamento do frete</h4>
                    </div>
                    <div class="modal-body">
                        <div class="hide-body">
                            <center>
                                <img class="imagemMapa img-responsive center-block borda-image" width="140" height="140" src="">
                            </center>
                            <br>
                        </div>
                        <form  id="formFechamentoFrete">
                            <input type="hidden" name="frete_id" id="frete_id" value="{{$frete->id}}" />
                            <input type="hidden"  class="latitude"name="latitude_fechamento" value="{{old('latitude_saida_cliente')}}">
                            <input type="hidden" class="longitude" name="longitude_fechamento" value="{{old('longitude_saida_cliente')}}">
                            <input type="hidden" class="mapa" name="mapa_fechamento" value="{{old('mapa_cliente_saida')}}">
                            <div class="row mb10">
                                <div class="col-md-12 col-lg-12col-sm-12 col-xs-12">
                                    <textarea id="observacao" rows="4" required="required" name="observacao_fechamento" class="form form-control col-md-7 col-xs-12" placeholder="Observação *">{{old('observacao_fechamento')}}</textarea>
                                </div>

                            </div>
                            <div class="row mb10">
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <input id="km_fechamento" maxlength="8" required="required" name="km_fechamento" class="form form-control" type="number" placeholder="Informe o KM *">
                                </div>
                            </div>
                            <div class="row mb10">
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <input id="hora_munk"  required="required" name="hora_munk" class="form form-control" type="time" placeholder="Tempo munk *">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <button id="btnSalvar" style="margin-right: auto" type="submit" class="btn btn-primary center-block btn-lg">Salvar</button>
                            </div>
                        </form>
                        <!-- Sucesso -->

                    </div>

                </div>
            </div>
        </div>
    @endif

@section('frete')
    <script src="{{asset('build/js/frete.js')}}"></script>
@endsection
@endsection