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

Route::get('/', function () {
    return view('app');
});

Route::get('/leads',[
    'uses' => 'LeadController@novo'
]);

Route::group(['prefix' => 'leads'],function() {

    //Novo lead
    Route::post('/salvarlead',['as'=>'leads.novo','uses'=>'LeadController@salvarNovoLeads']);



    //Route::get('/',['as'=>'leads', 'uses' => 'AdminController@mostrarLeads']);
    //Route::get('{id}/edit',['as'=>'admin.leads.edit','uses'=>'AdminController@edit']);
    //Route::post('/editarlead',['as'=>'admin.leads.editarlead','uses'=>'AdminController@editLead']);
    //Route::post('/salvarleadhistorico',['as'=>'admin.leads.salvarleadhistorico','uses'=>'AdminController@addHistoricoLead']);
    //Route::get('{id}/{idLead}/inativarleadhistorico',['as'=>'admin.leads.inativarhistorico','uses'=>'AdminController@inativarHistoricoLead']);

});

Route::get('teste','LeadController@IgoUUU');