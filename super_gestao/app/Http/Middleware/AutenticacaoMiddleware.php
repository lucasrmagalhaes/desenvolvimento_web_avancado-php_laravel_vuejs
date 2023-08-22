<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticao, $perfil)
    {
        // verifica se o usuário possui acesso a rota
        echo $metodo_autenticao . ' - ' . $perfil . '<br>';

        if ($metodo_autenticao == 'padrao') {
            echo 'Verificar o usuário e senha no banco de dados.' . $perfil . '<br>';
        }

        if ($metodo_autenticao == 'ldap') {
            echo 'Verificar o usuário e senha no AD.' . $perfil . '<br>';
        }

        if ($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos';
        } else {
            echo 'Carregar o perfil do banco de dados';
        }

        if (false) {
            return $next($request);
        } else {
            return Response('Acesso negado! Rota exige autenticação!');
        }
    }

}
