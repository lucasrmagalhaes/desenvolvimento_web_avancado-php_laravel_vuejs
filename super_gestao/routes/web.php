<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login', function() { return 'Login'; })->name('site.login');

Route::prefix('/app')->group(function() {
    Route::middleware('autenticacao')->get('/clientes', function() { return 'Clientes'; })->name('app.clientes');
    Route::middleware('autenticacao')->get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::middleware('autenticacao')->get('/produtos', function() { return 'Produtos'; })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial.';
});
