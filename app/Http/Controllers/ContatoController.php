<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato() {
        $motivo_contatos = $motivo_contatos = MotivoContato::all();
        
        return view(
            'site.contato', 
            [
                'titulo' => 'Contato', 
                'motivo_contatos' => $motivo_contatos
            ]
        );
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', // unique - nome da tabela
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres!',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres!',
            'nome.unique' => 'O nome informado já está incluso',
            'required' => 'O campo :attribute deve ser preenchido!',
            'email' => 'Informe um e-mail válido!',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres!'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}