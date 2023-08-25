@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
                @csrf
                @method('PUT')

                <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta" />

                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta" />

                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta" />

                {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                <select name="unidade_id">
                    <option>Selecione a unidade de medida</option>

                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                            {{ $unidade->descricao }}
                        </option>
                    @endforeach
                </select>

                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
