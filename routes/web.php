<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/consultar_cep','HomeController@searchCep');
Route::group(['middleware' => 'auth', 'where'=>['id'=>'[0-9]+']],function(){

    Route::get('/', function () {
        if(!empty(Auth::user()->unidade->first()->pivot->unidades_id)){
            \Session::put('unidade_id',Auth::user()->unidade->first()->pivot->unidades_id);
        }

        return view('principal');
    });
    Route::post('/ponto-partida','LocalController@storeLocal');

    Route::group(['prefix' => 'gerencia'],function() {

        //Novo lead abrir para cadastrar
        Route::get('/',[
            'as' => 'gerencia',
            'uses' => 'AdminController@relatorioGeralLeads'
        ]);
        Route::get('/ponto-de-partida',['as' => 'pdp','uses'=> 'AdminController@pdp']);
        Route::get('{id}/vermais',['as' => 'geral.vermais','uses' => 'AdminController@verMaisLeads']);
        Route::get('{id}/vermaispdp',['as' => 'geral.vermaispdp','uses' => 'AdminController@verMaisLPdp']);

        Route::get('/novo',['as'=>'leads.novo', 'uses' => 'LeadController@novo']);


    });
    Route::group(['prefix' => 'leads'],function() {

        //Novo lead abrir para cadastrar
        Route::get('/',[
            'as' => 'leads',
            'uses' => 'LeadController@mostrarLeads'
        ]);
        Route::get('/leadstodos', 'LeadController@leadsTodos');
        Route::get('/leadsinativo', 'LeadController@leadsInativo');
        Route::get('/novo',['as'=>'leads.novo', 'uses' => 'LeadController@novo']);
        //Novo lead salvar
        Route::post('/salvarlead',['as'=>'leads.salvar','uses'=>'LeadController@salvarNovoLeads']);
        //Abrir o lead para editar/add tarefa/outros
        Route::get('{id}/editelead',['as'=>'leads.edite','uses'=>'LeadController@abrirEditeLeads']);
        //Editar/Salvar alteração no cadastro
        Route::post('/salvareditelead',['as'=>'leads.editesalvarlead','uses'=>'LeadController@salvarEditartLead']);
        //Adicionar tarefa ao lead
        Route::post('/salvarleadhistorico',['as'=>'leads.salvarleadhistorico','uses'=>'LeadController@addHistoricoLead']);

        Route::get('{id}/{idLead}/inativarleadhistorico',['as'=>'leads.inativarhistorico','uses'=>'LeadController@inativarHistoricoLead']);

    });


    Route::group(['prefix' => 'clientes'],function() {

        //Novo lead abrir para cadastrar
        Route::get('/',[
            'as' => 'clientes',
            'uses' => 'ClienteController@mostrarClientes'
        ]);
        Route::get('/novo',['as'=>'clientes.novo', 'uses' => 'ClienteController@novo']);
        //Novo lead salvar
        Route::post('/salvarCliente',['as'=>'clientes.salvar','uses'=>'ClienteController@novoCliente']);
        //Abrir o lead para editar/add tarefa/outros
        Route::get('{id}/editarCliente',['as'=>'clientes.editar','uses'=>'ClienteController@editarLead']);

    });
    Route::group(['prefix' => 'frete'],function() {

        //Novo lead abrir para cadastrar
        Route::get('/',[
            'as' => 'frete',
            'uses' => 'FreteController@index'
        ]);
        Route::post('/frete-abertura','FreteController@salvarFreteAbertura');
        Route::post('/frete-chegada','FreteController@freteChegadaCliente');
        Route::post('/frete-saida','FreteController@freteSaidaCliente');
        Route::post('/frete-fechamento','FreteController@freteFechamento');
        Route::get('/novo',['as'=>'frete.novo', 'uses' => 'FreteController@novo']);
        Route::get('/controle/{id}',['as' =>'frete.controle', 'uses' => 'FreteController@freteControle']);


    });
});
Route::get('logout', '\proloc\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/login','\proloc\Http\Controllers\Auth\LoginController@mostraUnidade');
