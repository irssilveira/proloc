@extends('app')

@section('content')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Leads</h3>
                </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
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
                            <br />
                            <form id="form1" action="<?=route('leads.novo')?>" method="post" role="form" accept-charset="UTF-8" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="unidades_id" name="unidades_id" value="1">

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="nome" name="nome" placeholder="Nome" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="telefone" name="telefone" placeholder="Telefone" required="required" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '(99) 9999-9999'">

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="celular" name="celular" placeholder="Celular" required="required" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '(99) 99999-9999'">

                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="email" id="email" name="email" placeholder="Email" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="sexo" value="Masculino"> Masculino
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="sexo" value="Feminino"> Feminino
                                        </label>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="endereco" name="endereco" placeholder="Endereço" required="required" class="form-control col-md-7 col-xs-12">

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="bairro" name="bairro" placeholder="Bairro" required="required" class="form-control col-md-7 col-xs-12">

                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="cidade" name="cidade" placeholder="Cidade" required="required" class="form-control col-md-7 col-xs-12">

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="estado" name="estado" placeholder="Estado" required="required" class="form-control col-md-7 col-xs-12">

                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <textarea id="equipamento" placeholder="Equipamento" required="required" class="form-control" name="equipamento" data-parsley-trigger="keyup"
                                data-parsley-minlength="1" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                data-parsley-validation-threshold="10"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <textarea id="observacao" placeholder="Observação" required="required" class="form-control" name="observacao" data-parsley-trigger="keyup"
                                data-parsley-minlength="1" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                data-parsley-validation-threshold="10"></textarea>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="dataRetorno" name="dataRetorno" placeholder="Data Retorno" required="required" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '99/99/9999'">

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="mensagem" name="mensagem" placeholder="Mensagem" required="required" class="form-control col-md-7 col-xs-12">

                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>




@endsection