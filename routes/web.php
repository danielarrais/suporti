<?php

Route::get('/', ['as'=>'site.home', 'uses'=>function () {return redirect()->route('suporte.home');}]);
Route::get('/login', ['as'=>'site.login', 'uses'=>'LoginController@index']);
Route::post('/login/validar', ['as'=>'site.login.validar', 'uses'=>'LoginController@logar']);
Route::get('/login/sair', ['as'=>'site.login.sair', 'uses'=>'LoginController@sair']);

Route::group(['middleware'=>'auth'], function(){
//user

    Route::get('/user/chamados', ['as'=>'user.home', 'uses'=>'HomeUserController@listaChamados']);
    Route::get('/user/chamado/novo', ['as'=>'user.chamado', 'uses'=>'HomeUserController@index']);
    Route::get('/user/chamado/cancelar/{id}', ['as'=>'user.chamado.excluir', 'uses'=>'HomeUserController@excluirChamado']);
    Route::get('/user/chamado/visualizar/{id}', ['as'=>'user.chamado.vizualizar', 'uses'=>'HomeUserController@carregarChamado']);
    Route::post('/user/chamado/novo/sucesso', ['as'=>'user.chamado.sucesso', 'uses'=>'HomeUserController@salvar']);
    Route::get('/perfil/visualizar/{id}', ['as'=>'user.perfil.vizualizar', 'uses'=>'VisualizarPerfilController@carregarPerfil']);

//suporte

    Route::get('/suporte/chamados', ['as'=>'suporte.home', 'uses'=>'HomeSuporteController@listaChamados']);
    Route::get('/suporte/chamado/atender/{id}', ['as'=>'suporte.chamado.atender', 'uses'=>'HomeSuporteController@atenderChamado']);
    Route::get('/suporte/chamado/visualizar/{id}', ['as'=>'suporte.chamado.vizualizar', 'uses'=>'HomeSuporteController@carregarChamado']);
    Route::get('/suporte/chamado/finalizar/{id}', ['as'=>'suporte.chamado.finalizar', 'uses'=>'HomeSuporteController@finalizarChamado']);
    Route::get('/suporte/chamado/rejeitar/form/{id}', ['as'=>'suporte.chamado.rejeitar.form', 'uses'=>'HomeSuporteController@formRejeicao']);
    Route::post('/suporte/chamado/rejeitar', ['as'=>'suporte.chamado.rejeitar', 'uses'=>'HomeSuporteController@rejeitarChamado']);

});
