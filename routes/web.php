<?php

Route::get('/', ['as' => 'site.home', 'uses' => function () {
    return redirect()->route('suporte.home');
}]);
Route::get('/login', ['as' => 'site.login', 'uses' => 'LoginController@index']);
Route::post('/login/validar', ['as' => 'site.login.validar', 'uses' => 'LoginController@logar']);
Route::get('/login/sair', ['as' => 'site.login.sair', 'uses' => 'LoginController@sair']);

Route::group(['middleware' => ['auth'] ], function () {
    //user
    Route::get('/user/alterarsenha', ['as' => 'user.alterarsenha', 'uses' => 'HomeUserController@formNovaSenha']);
    Route::post('/user/alterarsenha', ['as' => 'user.alterarsenha', 'uses' => 'HomeUserController@salvarNovaSenha']);
    Route::get('/user/chamados', ['as' => 'user.home', 'uses' => 'HomeUserController@listaChamados']);
    Route::post('/user/chamados', ['as' => 'user.chamado.buscar', 'uses' => 'HomeUserController@search']);
    Route::get('/user/chamado/novo', ['as' => 'user.chamado', 'uses' => 'HomeUserController@index']);
    Route::get('/user/chamado/cancelar/{id}', ['as' => 'user.chamado.excluir', 'uses' => 'HomeUserController@excluirChamado']);
    Route::get('/user/chamado/visualizar/{id}', ['as' => 'user.chamado.vizualizar', 'uses' => 'HomeUserController@carregarChamado']);
    Route::post('/user/chamado/novo/sucesso', ['as' => 'user.chamado.sucesso', 'uses' => 'HomeUserController@salvar']);
    Route::get('/perfil/visualizar/{id}', ['as' => 'user.perfil.vizualizar', 'uses' => 'VisualizarPerfilController@carregarPerfil']);

    //suporte

    Route::get('/suporte/chamados', ['as' => 'suporte.home', 'uses' => 'HomeSuporteController@listaChamados']);
    Route::get('/suporte/chamado/atender/{id}', ['as' => 'suporte.chamado.atender', 'uses' => 'HomeSuporteController@atenderChamado']);
    Route::get('/suporte/chamado/visualizar/{id}', ['as' => 'suporte.chamado.vizualizar', 'uses' => 'HomeSuporteController@carregarChamado']);
    Route::get('/suporte/chamado/finalizar/{id}', ['as' => 'suporte.chamado.finalizar', 'uses' => 'HomeSuporteController@finalizarChamado']);
    Route::get('/suporte/chamado/rejeitar/form/{id}', ['as' => 'suporte.chamado.rejeitar.form', 'uses' => 'HomeSuporteController@formRejeicao']);
    Route::post('/suporte/chamado/rejeitar', ['as' => 'suporte.chamado.rejeitar', 'uses' => 'HomeSuporteController@rejeitarChamado']);
    Route::post('/suporte/chamados', ['as' => 'suporte.chamado.buscar', 'uses' => 'HomeSuporteController@search']);


    //admin

    Route::get('/admin/home', ['as' => 'admin.home', 'uses' => 'HomeAdminController@index']);
    Route::get('/admin/usuarios', ['as' => 'admin.usuarios', 'uses' => 'UsuariosAdminController@index']);
    Route::post('/admin/usuario/atualizar', ['as' => 'admin.atualizar.usuario', 'uses' => 'UsuariosAdminController@atualizarUsuario']);
    Route::get('/admin/usuario/desativar/{id}', ['as' => 'admin.desativar.usuario', 'uses' => 'UsuariosAdminController@ativarOuDesativarUsuario']);
    Route::get('/admin/usuario/ativar/{id}', ['as' => 'admin.ativar.usuario', 'uses' => 'UsuariosAdminController@ativarOuDesativarUsuario']);
    Route::get('/admin/usuario/{acao}', ['as' => 'admin.novo.usuario', 'uses' => 'UsuariosAdminController@novoUsuario']);
    Route::post('/admin/usuario/salvar', ['as' => 'admin.salvar.usuario', 'uses' => 'UsuariosAdminController@criarUsuario']);
    Route::post('/admin/usuario/excluir', ['as' => 'admin.excluir.usuario', 'uses' => 'UsuariosAdminController@excluirUsuario']);
    Route::post('/admin/usuario/novasenha', ['as' => 'admin.senha.usuario', 'uses' => 'UsuariosAdminController@gerarSenha']);
    Route::get('/admin/usuario/{acao}/{id}', ['as' => 'admin.editar.usuario', 'uses' => 'UsuariosAdminController@editarUsuario']);
    Route::get('/admin/funcoes', ['as' => 'admin.funcoes', 'uses' => 'AdminFuncaoController@index']);
    Route::get('/admin/funcoes/{id}', ['as' => 'admin.editar.funcoes', 'uses' => 'AdminFuncaoController@editarFuncao']);
    Route::post('/admin/funcoes/salvar', ['as' => 'admin.salvar.funcao', 'uses' => 'AdminFuncaoController@salvarFuncao']);
    Route::post('/admin/funcoes/excluir', ['as' => 'admin.excluir.funcao', 'uses' => 'AdminFuncaoController@excluirFuncao']);
    Route::get('/admin/setores', ['as' => 'admin.setores', 'uses' => 'AdminSetorController@index']);
    Route::get('/admin/setores/{id}', ['as' => 'admin.editar.setores', 'uses' => 'AdminSetorController@editarSetor']);
    Route::post('/admin/setores/salvar', ['as' => 'admin.salvar.setor', 'uses' => 'AdminSetorController@salvarSetor']);
    Route::post('/admin/setores/excluir', ['as' => 'admin.excluir.setor', 'uses' => 'AdminSetorController@excluirSetor']);



});
