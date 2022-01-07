<?php

use Illuminate\Support\Facades\Route;

/*
    Route::get('/', function () {
        return 'Olá, seja bem-vindo ao curso!';
    });
*/

Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');

Route::get('/contato/{nome}/{categoria_id}', 
    function(
        string $nome = 'Desconhecido', 
        int $categoria_id = 1
    ) {
        echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');

/* verbo http

get
post
put
patch
delete
options

*/