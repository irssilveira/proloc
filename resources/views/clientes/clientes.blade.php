@extends('app')

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Cliente</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" style="position: relative">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastro Cliente<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#dados">Dados *</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#contatos">Contatos *</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#cond_pagamento">Condições de pagamento *</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#corres">Correspondência *</a>
                        </li>
                    </ul>
                </div>
                <br />
                <div class="tab-content">
                    <div id="dados" class="tab-pane fade in active">
                        <form novalidate id="form1" action="{{route('clientes.salvar')}}" method="post" role="form" accept-charset="UTF-8"  data-parsley-validate class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="unidades_id" name="unidade_id" value="<?=(\Session::get('unidade_id'))?>">

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <h2 class="text-center">Tipo de cadastro *</h2>
                                <div class="form-group text-center font-radio">
                                    <label class="radio-inline">
                                        <input type="radio" id="fisica" name="tipo" required >Pessoa Física
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" id="juridica" name="tipo" required>Pessoa Jurídica
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group{{ $errors->has('razao_social_nome') ? ' has-error' : '' }}">
                                <input type="text" id="razaoSocialNome" name="razao_social_nome" placeholder="Razão Social ou nome *" value="{{old('razao_social_nome')}}"  required class="form hide form-control col-md-7 col-xs-12" />
                                @if ($errors->has('razao_social_nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('razao_social_nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group{{ $errors->has('razao_social_nome') ? ' has-error' : '' }}">
                                <input type="text" id="nomeFantasia" name="nome_fantasia" placeholder="Nome fantasia *" value="{{old('nome_fantasia')}}" required class="form form-control hide col-md-7 col-xs-12" />
                                @if ($errors->has('nome_fantasia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome_fantasia') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- essa parte se a pessoa for jurídica -->
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('cnpj_cpf') ? ' has-error' : '' }}">
                                <input type="text" id="cnpj" name="cnpj_cpf" placeholder="CNPJ *" value="{{old('cnpj_cpf')}}" required="required" class="form form-control col-md-7 hide col-xs-12" data-inputmask="'mask': '99.999.999/9999-99'">
                                @if ($errors->has('cnpj_cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cnpj_cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('inscricao_estadual_rg') ? ' has-error' : '' }}">
                                <input type="text" id="inscricaoEstadual" name="inscricao_estadual_rg" placeholder="Inscrição Estadual" value="{{old('inscricao_estadual_rg')}}" required="required" class="form hide form-control col-md-7 col-xs-12">
                                @if ($errors->has('inscricao_estadual_rg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('inscricao_estadual_rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- fim parte pessoa juridica -->
                            <!-- parte pessoa física -->
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('cnpj_cpf') ? ' has-error' : '' }}">
                                <input type="text" id="cpf" name="cnpj_cpf" placeholder="CPF *" value="{{old('cnpj_cpf')}}" required="required" class="form form-control col-md-7 hide col-xs-12" data-inputmask="'mask': '999.999.999-99'">
                                @if ($errors->has('cnpj_cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cnpj_cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('inscricao_estadual_rg') ? ' has-error' : '' }}">
                                <input type="text" id="rg" name="inscricao_estadual_rg" placeholder="RG *" value="{{old('inscricao_estadual_rg')}}" required="required" class="form hide form-control col-md-7 col-xs-12" >
                                @if ($errors->has('inscricao_estadual_rg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('inscricao_estadual_rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" id="dataNascimento" name="data_nascimento" placeholder="Data de Nascimento" value="{{old('data_nascimento')}}" class="form form-control col-md-7 col-xs-12" data-inputmask="'mask': '99/99/9999'">
                            </div>

                            <!-- fim parte pessoa física -->

                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" id="cep" name="cep" placeholder="Cep" value="{{old('cep')}}" class="form form-control col-md-7 col-xs-12" data-inputmask="'mask': '99999-999'">

                            </div>


                            <div class="col-md-8 col-sm-8 col-xs-8 form-group{{ $errors->has('rua') ? ' has-error' : '' }}">
                                <input type="text" id="rua" name="rua" placeholder="Endereço *"  value="{{old('rua')}}" class="form form-control col-md-7 col-xs-12">
                                @if ($errors->has('rua'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rua') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                                <input type="text" id="numero" name="numero" placeholder="Número *"  value="{{old('numero')}}" class="form form-control col-md-7 col-xs-12">
                                @if ($errors->has('numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                                <input type="text" id="bairro" name="bairro" placeholder="Bairro *"  value="{{old('bairro')}}" class="form form-control col-md-7 col-xs-12">
                                @if ($errors->has('bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                                <input type="text" id="cidade" name="cidade" placeholder="Cidade *"  value="{{old('cidade')}}" class="form form-control col-md-7 col-xs-12" >
                                @if ($errors->has('cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12 form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                                <input type="text" id="estado" name="uf" placeholder="Estado *"  value="{{old('uf')}}" class="form form-control col-md-7 col-xs-12">
                                @if ($errors->has('uf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uf') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-12 col-sm-12 col-xs-12 form-group{{ $errors->has('referencia') ? ' has-error' : '' }}">
                                <textarea id="referencia" placeholder="Referência" required="required" class="form textarea form-control" name="referencia" data-parsley-trigger="keyup">{{old('referencia')}}</textarea>
                                @if ($errors->has('referencia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referencia') }}</strong>
                                    </span>
                                @endif
                            </div>

                    </div>
                    <div id="contatos" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-2 col-xs-12">
                                <input type="text" id="bairro" name="telefone" placeholder="Telefone *"  value="{{old('telefone')}}" class="form form-control col-md-7 col-xs-12" data-inputmask="'mask': '(99) 9999-9999'">
                                @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-2 col-xs-12">
                                <input type="text" id="bairro" name="bairro" placeholder="Bairro *"  value="{{old('bairro')}}" class="form form-control col-md-7 col-xs-12">
                                @if ($errors->has('bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-2 col-xs-12">
                                <input type="text" id="bairro" name="bairro" placeholder="Bairro *"  value="{{old('bairro')}}" class="form form-control col-md-7 col-xs-12">
                                @if ($errors->has('bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="cond_pagamento" class="tab-pane fade">
                        teste2
                    </div>
                    <div id="corres" class="tab-pane fade">
                        teste3
                    </div>
                    <div class="ln_solid"></div>

                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="form-btn btn btn-success">Salvar</button>
                    </div>
                </div>

                </form>

            </div>
        </div>
        <div class="text-center hide sucesso alert alert-success">
            <strong>Leads aberto com sucesso!</strong>.
        </div>

    </div>
@endsection