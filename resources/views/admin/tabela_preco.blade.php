@extends('principal.store')

@section('content')

    <div class="row">
        <div class="col-md-12 breadcrumb ">

            <div class="btn-group btn-breadcrumb">
                <a href="{{url('/')}}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i></a>
                <a href="{{route('frete.preco.total')}}" class="btn btn-info">Relatório Frete</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" style="position: relative">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastro do Valor de frete<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form id="form1" action="<?=route('salvar.frete.preco')?>" method="post" role="form" accept-charset="UTF-8"  class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="unidade_id" name="unidades_id" value="<?=(\Session::get('unidade_id'))?>">

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('preco_frete') ? ' has-error' : '' }}">
                            <label>Valor do Frete</label>
                            <input type="text" id="preco_frete" name="preco_frete" placeholder="Informe o preco frete" value="{{old('preco_frete')}}" onkeypress="mascaraCampo(this,mvalor)"  maxlength="14" autofocus class="form form-control col-md-7 col-xs-12">
                            @if ($errors->has('preco_frete'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('preco_frete') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group{{ $errors->has('hora_munk') ? ' has-error' : '' }}">
                            <label>Hora munk *</label>
                            <input type="text" id="hora_munk" name="hora_munk" placeholder="Informe o valor * " value="{{old('hora_munk')}}" onkeypress="mascaraCampo(this,mvalor)"  maxlength="14" required="required" class="form form-control col-md-7 col-xs-12" >
                            @if ($errors->has('hora_munk'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('hora_munk') }}</strong>
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
    </div>
@endsection