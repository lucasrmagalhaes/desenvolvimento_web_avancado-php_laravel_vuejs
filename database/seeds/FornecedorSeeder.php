<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    public function run()
    {
        // Instanciando o objeto
        $fornecedor = new Fornecedor();
        
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'RS';
        $fornecedor->email = 'contato@fornecedor100.com.br';

        $fornecedor->save();

        // Método create (atenção para o atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'CE',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        // Insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
