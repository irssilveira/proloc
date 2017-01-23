@extends('principal.store')

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
                            <input type="hidden" id="unidades_id" name="unidade_id" value="{{auth()->user()->unidade->first()->pivot->unidades_id}}">

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

                            <div class="col-lg-offset-4 col-md-offset-4 col-md-5 col-lg-5 col-sm-12 col-xs-12 form-group">
                                <label>Limite de crédito:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">R$</span>
                                    <input type="text" id="limite" name="limite" placeholder="Limite de crédito *"  value="{{old('limite')}}" class="form form-control col-md-7 col-xs-12">
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
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group{{ $errors->has('nome_fantasia') ? ' has-error' : '' }}">
                                <input type="text" id="nomeFantasia" name="nome_fantasia" placeholder="Nome fantasia *" value="{{old('nome_fantasia')}}" required class="form form-control hide col-md-7 col-xs-12" />
                                @if ($errors->has('nome_fantasia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome_fantasia') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- essa parte se a pessoa for jurídica -->
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('cnpj_cpf') ? ' has-error' : '' }}">
                                <input type="text" id="cnpj" name="cnpj_cpf" placeholder="CNPJ *" value="{{old('cnpj_cpf')}}"  class="form form-control col-md-7 hide col-xs-12" data-inputmask="'mask': '99.999.999/9999-99'">

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
                            <input type="hidden" name="cliente_id" />
                            <div class="col-md-4 col-lg-4 col-sm-2 col-xs-12">
                                <input type="text" id="telefone" name="telefone" placeholder="Telefone *"  value="{{old('telefone')}}" class="form form-control col-md-7 col-xs-12" data-inputmask="'mask': '(99) 9999-9999'">

                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-2 col-xs-12 form-group">
                                <input type="text" id="operadora" name="operadora" placeholder="operadora *"  value="{{old('operadora')}}" class="form form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-2 col-xs-12 form-group">
                                <select class="form form-control" name="cargo">
                                    <option value="">Selecione uma opção...</option>
                                    <option value="Mestre de Obra">Mestre de Obra</option>
                                    <option value="Engenheiro">Engenheiro</option>
                                    <option value="Diretor">Diretor</option>
                                    <option value="Proprietário">Proprietário</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>

                            <div class="col-md-4 col-lg-4 col-sm-2 col-xs-12 form-group">
                                <input type="text" id="contato" name="contato" placeholder="Contato *"  value="{{old('contato')}}" class="form form-control col-md-7 col-xs-12">

                            </div>
                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 form-group">
                                <input type="email" id="email" name="email" placeholder="Email *"  value="{{old('email')}}" class="form form-control col-md-7 col-xs-12">

                            </div>
                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="principal" value="1">Principal</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="cond_pagamento" class="tab-pane fade">

                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Formas de Pagamento:</legend>
                                    @foreach($formaPagamentos as $formaPagamento)
                                        <label class="checkbox-inline"><input name="forma_pagamento[]" type="checkbox" value="{{$formaPagamento->id}}">{{$formaPagamento->nome}}</label>
                                    @endforeach
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Observação: </label>
                                <textarea name="observacao" rows="5" class="form form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12 form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" id="franqueadoCheck" name="franqueado" value="S">Franqueado</label>

                                </div>
                            </div>
                            <div id="temFranqueado" class="hide col-md-8 col-lg-8 col-sm-12 col-xs-12 form-group">
                                <label>Nome da Unidade: </label>
                                <input type="text"  name="unidade_franqueado"   value="{{old('unidade_franqueado')}}" class="form form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div id="corres" class="tab-pane fade">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <input type="text" id="cep_correspondencia" name="cep_correspondencia" placeholder="Cep" value="{{old('cep_correspondencia')}}" class="form form-control col-md-7 col-xs-12" data-inputmask="'mask': '99999-999'">

                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                            <input type="text" id="endereco_correspondencia" name="endereco_correspondencia" placeholder="Endereço Correspondência*"  value="{{old('endereco_correspondencia')}}" class="form form-control col-md-7 col-xs-12">

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                            <input type="text" id="bairro_correspondencia" name="bairro_correspondencia" placeholder="Bairro Correspondência *"  value="{{old('bairro_correspondencia')}}" class="form form-control col-md-7 col-xs-12">

                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                            <input type="text" id="cidade_correspondencia" name="cidade_correspondencia" placeholder="Cidade Correspondência *"  value="{{old('cidade_correspondencia')}}" class="form form-control col-md-7 col-xs-12">
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                            <input type="text" id="estado_correspondencia" name="estado_correspondencia" placeholder="Estado Correspondência *"  value="{{old('estado_correspondencia')}}" class="form form-control col-md-7 col-xs-12" >

                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <textarea id="referencia_correspondencia" placeholder="Referência" required="required" class="form textarea form-control" name="referencia_correspondencia" data-parsley-trigger="keyup">{{old('referencia_correspondencia')}}</textarea>
                        </div>
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


    </div>
@endsection