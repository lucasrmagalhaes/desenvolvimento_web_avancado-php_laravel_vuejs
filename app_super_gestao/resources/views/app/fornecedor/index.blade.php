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
@endphp

{{-- Sintaxe do blade não precisa ; --}}
{{-- @dd($fornecedores) --}}

{{-- if | elseif | else | endif --}}
{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif --}}

{{-- @unless executa se o retorno for false --}}
Fornecedor: {{ $fornecedores[0]['nome'] }}

<br>

Status: {{ $fornecedores[0]['status'] }}

<br>

@if(!($fornecedores[0]['status'] == 'S'))
    Fornecedor inativo
@endif

<br>

@unless($fornecedores[0]['status'] == 'S') <!-- se o retorno da condição for false -->
    Fornecedor inativo
@endunless