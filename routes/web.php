<?php

Route::get('/', ['as'=>'site.home', 'uses'=>function () {return redirect()->route('site.login');}]);
Route::get('/login', ['as'=>'site.login', 'uses'=>'LoginController@index']);
Route::post('/login/validar', ['as'=>'site.login.validar', 'uses'=>'LoginController@logar']);
Route::get('/login/sair', ['as'=>'site.login.sair', 'uses'=>'LoginController@sair']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('/user/chamados', ['as'=>'user.home', 'uses'=>'HomeUserController@listaChamados']);
    Route::get('/user/chamado/novo', ['as'=>'user.chamado', 'uses'=>'HomeUserController@index']);
    Route::get('/user/chamado/excluir/{id}', ['as'=>'user.chamado.excluir', 'uses'=>'HomeUserController@excluirChamado']);
    Route::post('/user/chamado/novo/sucesso', ['as'=>'user.chamado.sucesso', 'uses'=>'HomeUserController@salvar']);

//suporte

    Route::get('/suporte/chamados', ['as'=>'suporte.home', 'uses'=>'HomeSuporteController@listaChamados']);
    Route::get('/suporte/chamado/atender/{id}', ['as'=>'suporte.chamado.atender', 'uses'=>'HomeSuporteController@atenderChamado']);
});
