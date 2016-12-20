@extends('principal.store')

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Leads</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" style="position: relative">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastro Lead<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form id="form1" action="<?=route('leads.salvar')?>" method="post" role="form" accept-charset="UTF-8" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="unidades_id" name="unidades_id" value="<?=(\Session::get('unidade_id'))?>">
                        <input type="hidden" id="latitude" name="latitude" value="{{old('latitude')}}">
                        <input type="hidden" id="longitude" name="longitude" value="{{old('longitude')}}">
                        <input type="hidden" id="mapa" value="{{old('src_mapa')}}" name="src_mapa" />

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <input type="text" id="nome" name="nome" placeholder="Contato" value="{{old('nome')}}" autofocus class="form form-control col-md-7 col-xs-12">
                            @if ($errors->has('nome'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <input type="text" id="telefone" name="telefone" placeholder="Telefone para contato" value="{{old('telefone')}}" required="required" class="form form-control col-md-7 col-xs-12" data-inputmask="'mask': '(99) 9999-9999'">
                            @if ($errors->has('telefone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" id="email" name="email" placeholder="Email"  value="{{old('email')}}" class="form form-control col-md-7 col-xs-12" >
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <select name="sexo" class="form form-control col-md-7 col-xs-12">
                                <option value="">Seleciona o gênero</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>

                            </select>
                        </div>


                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <input type="text" id="endereco" name="endereco" placeholder="Endereço"  value="{{old('endereco')}}" class="form form-control col-md-7 col-xs-12">
                            @if ($errors->has('endereco'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                            <input type="text" value="{{old('bairro')}}" id="bairro" name="bairro" placeholder="Bairro"  class="form form-control col-md-7 col-xs-12">
                            @if ($errors->has('bairro'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                            <input type="text" value="{{old('cidade')}}" id="cidade" name="cidade" placeholder="Cidade" required="required" class="form form-control col-md-7 col-xs-12">
                            @if ($errors->has('cidade'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                            <input type="text" value="{{old('estado')}}" id="estado" name="estado" placeholder="Estado" required="required" class="form form-control col-md-7 col-xs-12">
                            @if ($errors->has('estado'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                            <textarea id="equipamento" placeholder="Equipamento" required="required" class="form textarea form-control" name="equipamento" data-parsley-trigger="keyup">{{old('equipamento')}}</textarea>
                            @if ($errors->has('equipamento'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('equipamento') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group{{ $errors->has('observacao') ? ' has-error' : '' }}">
                                <textarea id="observacao" placeholder="Observação" required="required" class="form textarea form-control" name="observacao" data-parsley-trigger="keyup"
                                          data-parsley-minlength="1" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                          data-parsley-validation-threshold="10">{{old('observacao')}}</textarea>
                            @if ($errors->has('observacao'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('observacao') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('dataRetorno') ? ' has-error' : '' }}">
                            <input type="text" id="dataRetorno" name="dataRetorno" placeholder="Data Retorno" value="{{old('dataRetorno')}}" required="required" class="form form-control col-md-7 col-xs-12" data-inputmask="'mask': '99/99/9999'">
                            @if ($errors->has('dataRetorno'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('dataRetorno') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('mensagem') ? ' has-error' : '' }}">
                            <input type="text" id="mensagem" name="mensagem" placeholder="Mensagem" value="{{old('mensagem')}}" required="required" class="form form-control col-md-7 col-xs-12">
                            @if ($errors->has('mensagem'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mensagem') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="form-btn btn btn-success">Salvar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="text-center hide sucesso alert alert-success">
            <strong>Leads aberto com sucesso!</strong>.
        </div>

    </div>
@section('geolocation')
    <script src="{{asset('build/js/geolocation.js')}}"></script>
@endsection
@endsection