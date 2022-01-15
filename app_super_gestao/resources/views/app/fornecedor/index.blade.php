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

<h3>if | elseif | else | endif</h3> {{-- if | elseif | else | endif --}}
@if(count($fornecedores1) > 0 && count($fornecedores1) < 10)
    <h5>Existem alguns fornecedores cadastrados</h5>
@elseif(count($fornecedores1) > 10)
    <h5>Existem vários fornecedores cadastrados</h5>
@else
    <h5>Ainda não existem fornecedores cadastrados</h5>
@endif

<h3>unless</h3> {{-- @unless executa se o retorno for false --}}
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

<h3>isset</h3> 
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

<h3>empty</h3> 
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

    <br><br>
@endisset

{{-- Operador condicional de valor default (??) --}}

<h3>Operador condicional de valor default (??)</h3> 
@isset($fornecedores3) 
    CNPJ: {{ $fornecedores3[1]['cnpj'] ?? 'Dado não foi preenchido' }}

    <br><br>

    <!--
        $variavel testada não estiver definida
        ou
        $variavel testada possuir o valor null
    -->
@endisset

{{-- Switch/case --}}

<h3>Switch/case</h3> 
@isset($fornecedores4)
    Fornecedor: {{ $fornecedores4[1]['nome'] }}
    <br>
    Status: {{ $fornecedores4[1]['status'] }}
    <br>
    CNPJ: {{ $fornecedores4[1]['cnpj'] ?? '' }}
    <br>
    (DDD) Telefone: ({{ $fornecedores4[1]['ddd'] ?? '' }} {{ $fornecedores4[1]['telefone'] ?? '' }})

    <br><br>

    @switch($fornecedores4[0]['ddd'])
        @case ('11')
            São Paulo - SP
            @break
        @case ('32')
            Juiz de Fora - MG
            @break
        @case ('85')
            Fortaleza - CE
            @break
        @default
            Estado não identificado
    @endswitch
@endisset

<br>

{{-- for --}}

<h3>for</h3> 
@isset($fornecedores4)
    @for($i = 0; isset($fornecedores4[$i]); $i++)
        Fornecedor: {{ $fornecedores4[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores4[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores4[$i]['cnpj'] ?? '' }}
        <br>
        (DDD) Telefone: ({{ $fornecedores4[$i]['ddd'] ?? '' }}) {{ $fornecedores4[$i]['telefone'] ?? '' }}
        <hr>
    @endfor
@endisset

{{-- while --}}

<h3>while</h3> 
@isset($fornecedores4)
    @php $i = 0 @endphp

    @while(isset($fornecedores4[$i]))
        Fornecedor: {{ $fornecedores4[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores4[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores4[$i]['cnpj'] ?? '' }}
        <br>
        (DDD) Telefone: ({{ $fornecedores4[$i]['ddd'] ?? '' }}) {{ $fornecedores4[$i]['telefone'] ?? '' }}
        <hr>
        @php $i++ @endphp
    @endwhile
@endisset

{{-- foreach --}}

<h3>foreach</h3> 
@isset($fornecedores4)
    @foreach($fornecedores4 as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        (DDD) Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @endforeach
@endisset

{{-- forelse --}}

<h3>forelse</h3>
@isset($fornecedores5)
    @forelse($fornecedores5 as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        (DDD) Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @empty
        Não existem fornecedores cadastrados!
    @endforelse
@endisset