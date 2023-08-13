<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    public function run()
    {
        factory(SiteContato::class, 100)->create();

        /*
        $contato = new SiteContato();
        
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(51) 99999-9999';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem-vindo ao Sistema Super Gestão';

        $contato->save();
        */
    }
}