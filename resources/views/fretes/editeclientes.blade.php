@extends('principal.store')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading titulo-pagina">
                    Dados de Cadastro
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form  action="<?=route('leads.editesalvarlead')?>" method="post" role="form" accept-charset="UTF-8" enctype="multipart/form-data"  id="budget-form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="id" value="{{ $lead->id }}">
                            <div class="col-lg-6">

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="nome" name="nome" value="{{$lead->nome}}" placeholder="Contato" required="required" class="form form-control col-md-7 col-xs-12">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="telefone" name="telefone" value="{{$lead->telefone}}" placeholder="Telefone para contato" required="required" class="form form-control col-md-7 col-xs-12" data-inputmask="'mask': '(99) 9999-9999'">

                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="email" id="email" name="email" value="{{$lead->email}}" placeholder="Email" required="required" class="form form-control col-md-7 col-xs-12" >
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <select name="sexo" class="form form-control col-md-7 col-xs-12">
                                        <option value="">Seleciona o gênero</option>
                                        <option @if($lead->sexo == "Masculino")selected @endif value="Masculino">Masculino</option>
                                        <option @if($lead->sexo == "Feminino") selected @endif value="Feminino">Feminino</option>

                                    </select>
                                </div>


                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="endereco" name="endereco" value="{{$lead->endereco}}" placeholder="Endereço" required="required" class="form form-control col-md-7 col-xs-12">

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="bairro" name="bairro" value="{{$lead->bairro}}" placeholder="Bairro" required="required" class="form form-control col-md-7 col-xs-12">

                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="cidade" name="cidade" value="{{$lead->cidade}}" placeholder="Cidade" required="required" class="form form-control col-md-7 col-xs-12">

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" id="estado" name="estado" value="{{$lead->estado}}" placeholder="Estado" required="required" class="form form-control col-md-7 col-xs-12">

                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <textarea id="equipamento" placeholder="Equipamento" required="required" class="form textarea form-control" name="equipamento" data-parsley-trigger="keyup"
                                          data-parsley-minlength="1" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                          data-parsley-validation-threshold="10">{{$lead->equipamento}}</textarea>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <textarea id="observacao" placeholder="Observação" required="required" class="form textarea form-control" name="observacao" data-parsley-trigger="keyup"
                                          data-parsley-minlength="1" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                          data-parsley-validation-threshold="10">{{$lead->observacao}}</textarea>
                                </div>



                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">

                                <button type="submit" class="form-btn btn btn-default">Salvar</button>


                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </form>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading titulo-pagina">
                    Cadastro histórico
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form  role="form" accept-charset="UTF-8" id="formLead">
                            <input type="hidden" name="id" data-id="id" value="{{ $lead->id }}">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Mensagem:</label>
                                    <input class="form form-control" id="mensagem" name="mensagem">
                                </div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Data Retorno:</label>
                                    <input class="form form-control" id="dataRetorno" name="dataRetorno" data-inputmask="'mask': '99/99/9999'">
                                </div>


                                <button type="submit" class="btn form-btn btn-default">Salvar</button>

                            </div>
                        </form>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->


        <table id="tableLeadHistorico" class="table table-action">

            <thead>

            <tr>
                <th class="t-small">ID</th>

                <th class="t-small">Data Retorno</th>

                <th class="t-small">Mensagem</th>

                <th class="t-small">Finalizar</th>
            </tr>

            </thead>

            <tbody>

            @foreach($leadhistorico1 as $leadHistorico)

                <tr>
                    <td class="vertical-middle">{{$leadHistorico->id}}</td>

                    @if(strtotime('today UTC-3')<=strtotime($leadHistorico->dataRetorno))
                        <td class="vertical-middle" style="background-color:#5bf98b">{{ date("d/m/Y", strtotime($leadHistorico->dataRetorno)) }}</td>
                    @else
                        <td class="vertical-middle" style="background-color:#FF7D7D">{{ date("d/m/Y", strtotime($leadHistorico->dataRetorno)) }}</td>
                    @endif

                    <td class="vertical-middle">{{$leadHistorico->observacao}}</td>

                    <td  width="5%" class="text-center vertical-middle">
                        @if($leadHistorico->status == 'Pendente')
                            <div class="dropdown">

                                <a href="{{route('leads.inativarhistorico',['id'=>$leadHistorico->id, 'idLead'=>$lead->id])}}" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>



                            </div>
                        @endif

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>
        <div class="col-md-12">
            <div class="pull-left">
                <a class="btn btn-primary btn-lg" href="javascript:window.history.go(-1)">Voltar</a>
            </div>
        </div>
    </div>
@endsection