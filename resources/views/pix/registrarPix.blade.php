@extends('layouts.template')

@section('title')
    Home
@endsection

@section('main')
    <section>
        <h2 class="sectionTitle">Área Pix - Registrar</h2>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ url('/regPix') }}" method="post" class="fillerForm" autocomplete="off">
            <label>A chave Pix é o dado que você informa aos seus contatos para receber transferências em sua conta em
                poucos segundos.
                Você pode criar uma ou mais chaves, que podem ser e-mail, CPF/CNPJ ou telefone (incluindo números com
                DDD).</label>
            @csrf
            <label for="chavePix">
                Chave Pix:
                <input type="text" name="chavePix">
            </label>
            <button type="submit">Enviar</button>
            <a class="linkButton" href={{ url('/pix') }}>Cancelar</a>
        </form>
    </section>
@endsection
