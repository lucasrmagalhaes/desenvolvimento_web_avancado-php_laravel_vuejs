<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores1 = ['Fornecedor'];

        $fornecedores2 = [
            0 => [
                'nome' => 'Fornecedor 1', 
                'status' => 'N', 
                'cnpj' => '00.000.000/000-00'
            ],

            1 => [
                'nome' => 'Fornecedor 2', 
                'status' => 'S'
            ]
        ];

        $fornecedores3 = [
            0 => [
                'nome' => 'Fornecedor 1', 
                'status' => 'N', 
                'cnpj' => ''
            ]
        ];

        $fornecedores4 = [
            0 => [
                'nome' => 'Fornecedor 1', 
                'status' => 'N', 
                'cnpj' => '00.000.000/000-00',
                'ddd' => '11', // São Paulo (SP)
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2', 
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85', // Fortaleza (CE)
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'Fornecedor 3', 
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32', // Juiz de Fora (MG)
                'telefone' => '0000-0000'
            ]
        ];

        $fornecedores5 = [];

        /*
        Operador condicional ternário

        condicao ? se verdade : se falso;
        condicao ? se verdade : (condicao ? se verdade : se falso);
        */

        $msg = isset($fornecedores2[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        echo $msg;

        return view('app.fornecedor.index', compact(
            'fornecedores1', 'fornecedores2', 'fornecedores3', 'fornecedores4', 'fornecedores5'
        ));
    }
}