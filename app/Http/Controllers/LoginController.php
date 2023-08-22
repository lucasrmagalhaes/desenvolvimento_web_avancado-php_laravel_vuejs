<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index() {
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request) {
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório.',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        // validação
        $request->validate($regras, $feedback);

        // recuperamos os params do form
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // iniciar o Model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($usuario->name)) {
            echo 'Usuário existe.';
        } else {
            echo 'Usuário não existe.';
        }
    }
}
