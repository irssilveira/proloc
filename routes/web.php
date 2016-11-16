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

Route::group(['middleware' => 'auth', 'where'=>['id'=>'[0-9]+']],function(){

    Route::get('/', function () {
        if(!empty(Auth::user()->unidade->first()->pivot->unidades_id)){
            \Session::put('unidade_id',Auth::user()->unidade->first()->pivot->unidades_id);
        }

        return view('principal');
    });
    Route::post('/ponto-partida','LocalController@storeLocal');
    Route::group(['prefix' => 'leads'],function() {

        //Novo lead abrir para cadastrar
        Route::get('/',[
            'as' => 'leads',
            'uses' => 'LeadController@mostrarLeads'
        ]);
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
            'as' => 'leads',
            'uses' => 'LeadController@mostrarLeads'
        ]);
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
});
Route::get('logout', '\proloc\Http\Controllers\Auth\LoginController@logout');
Auth::routes(

);

Route::get('/home', 'HomeController@index');
Route::get('/login','\proloc\Http\Controllers\Auth\LoginController@mostraUnidade');