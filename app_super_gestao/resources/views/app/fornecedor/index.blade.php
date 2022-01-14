<h3>Fornecedor</h3>

{{ 'Texto de teste #1' }}
<?= 'Texto de teste #2' ?>

{{-- Fica o comentário que será descartado pelo interpretador do blade --}}

@php
    // Para comentários de uma linha

    /*
        Para comentários de multiplas linhas
    */

    echo 'Texto de teste #3 . <br><br>' ;
    
    /*
    if () {

    } elseif() {

    } else {

    }
    */

    /*
    if(isset($variavel)) {} // retorna true se a variável estiver definida
    */

    /*
    if(empty($variavel)) {} // retorna true se a variável estiver vazia
    - ''
    - 0
    - 0.0
    - '0'
    - null
    - false
    - array()
    - $var
    */
@endphp

{{-- Sintaxe do blade não precisa ; --}}

{{-- @dd($fornecedores1) --}}

{{-- if | elseif | else | endif --}}
@if(count($fornecedores1) > 0 && count($fornecedores1) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores1) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

{{-- @unless executa se o retorno for false --}}
Fornecedor: {{ $fornecedores2[0]['nome'] }}

<br>

Status: {{ $fornecedores2[0]['status'] }}

<br>

@if(!($fornecedores2[0]['status'] == 'S'))
    Fornecedor inativo
@endif

<br>

@unless($fornecedores2[0]['status'] == 'S') <!-- se o retorno da condição for false -->
    Fornecedor inativo
@endunless

<br><br>

{{-- @isset | @endisset --}}
@isset($fornecedores2)
    Fornecedor: {{ $fornecedores2[1]['nome'] }}
    
    <br>
    
    Status: {{ $fornecedores2[1]['status'] }}
    
    <br>
    
    @isset($fornecedores2[1]['cnpj'])
        CNPJ: {{ $fornecedores2[1]['cnpj'] }}
    @endisset

    <br>
@endisset

{{-- @empty --}}
@isset($fornecedores3)
    Fornecedor: {{ $fornecedores3[0]['nome'] }}
    
    <br>
    
    Status: {{ $fornecedores3[0]['status'] }}
    
    <br>
    
    @isset($fornecedores3[0]['cnpj'])
        CNPJ: {{ $fornecedores3[0]['cnpj'] }}
        @empty($fornecedores3[0]['cnpj'])
            - Vazio
        @endempty
    @endisset
@endisset

{{-- Operador condicional ternário --}}