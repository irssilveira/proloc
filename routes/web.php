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

    Route::get('/', 'AdminController@indexPrincipal');
    //Route::get('/','AdminController@mensagensHead');

    Route::post('/ponto-partida','LocalController@storeLocal');

    Route::group(['prefix' => 'gerencia'],function() {

        //Novo lead abrir para cadastrar
        Route::get('/',[
            'as' => 'gerencia',
            'uses' => 'AdminController@relatorioGeralLeads'
        ]);
        Route::get('/frete-relatorio',['as'=>'geral.frete','uses'=>'AdminController@freteGeral']);
        Route::get('/ponto-de-partida',['as' => 'pdp','uses'=> 'AdminController@pdp']);
        Route::get('{id}/vermais',['as' => 'geral.vermais','uses' => 'AdminController@verMaisLeads']);
        Route::get('{id}/vermaispdp',['as' => 'geral.vermaispdp','uses' => 'AdminController@verMaisLPdp']);
        Route::get('{id}/vermaisfrete',['as'=>'geral.vermaisfrete','uses'=>'AdminController@verMaisFrete']);


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
        Route::get('/fretes',['as'=> 'frete.total','uses'=> 'FreteController@totalFrete']);
        Route::get('{id}/frete-interno',['as'=>'frete.interno','uses'=>'FreteController@freteInterno']);
        Route::post('/frete-desativa/{id}',['as'=>'frete.desativa','uses'=> 'FreteController@freteDesativa']);
        Route::get('preco-frete-todos',['as'=>'frete.preco.total','uses'=>'FreteController@precoFreteTodos']);
        Route::get('/preco-frete',['as'=> 'frete.preco','uses'=>'FreteController@precoFrete']);
        Route::post('/salvar-preco-frete',['as'=> 'salvar.frete.preco','uses'=>'FreteController@salvarPrecoFrete']);
        Route::get('{id}/update-preco-frete',['as' => 'update.frete.preco','uses'=> 'FreteController@updatePrecoFrete']);
        Route::post('{id}/edit-preco-frete',['as'=> 'edit.frete.preco','uses'=>'FreteController@editPrecoFrete']);
    });
});
Route::get('logout', '\proloc\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/login','\proloc\Http\Controllers\Auth\LoginController@mostraUnidade');

Route::get('testeEmail','HomeController@testeEmail');
