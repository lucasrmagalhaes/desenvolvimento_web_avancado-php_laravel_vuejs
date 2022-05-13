<?php

use Illuminate\Support\Facades\Route;

/*
    Route::get('/', function () {
        return 'Olá, seja bem-vindo ao curso!';
    });
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function() { return 'Login'; })->name('site.login');

/*
    Route::get('/contato/{nome}/{categoria_id}', 
        function(
            string $nome = 'Desconhecido', 
            int $categoria_id = 1
        ) {
            echo "Estamos aqui: $nome - $categoria_id";
        }
    )->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
*/

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() { return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function() { return 'Produtos'; })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial.';
});

/* verbo http
    get
    post
    put
    patch
    delete
    options
*/