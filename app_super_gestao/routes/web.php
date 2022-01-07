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

Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
    function(
        string $nome = 'Desconhecido', 
        string $categoria = 'Informação', 
        string $assunto = 'Contato', 
        string $mensagem = 'Mensagem não Informada'
    ) {
        echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
    }
);

/* verbo http

get
post
put
patch
delete
options

*/