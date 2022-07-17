{{ $slot }}

<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    
    <br />
    
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    
    <br />
    
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    
    <br />
    
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'selected' : '' }}>{{ $motivo_contato }}</option>
        @endforeach
    </select>

    <br />

    <textarea name="mensagem" class="{{ $classe }}">
        {{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}
    </textarea>
    
    <br />
    
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

<div style="position: absolute; top: 0px; left: 0px; width: 100%; background-color: red;">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>