@extends('layouts.template')

@section('title')
    Home
@endsection

@section('main')
    <section>
        <h2 class="sectionTitle">Área Pix - Pagar</h2>
        <form action="{{ route('findPix') }}" method="post" class="fillerForm" autocomplete="off">
            <label>A chave Pix é o dado que você informa aos seus contatos para receber transferências em sua conta em
                poucos segundos.
                Você pode criar uma ou mais chaves, que podem ser e-mail, CPF/CNPJ e telefone (incluindo números com
                DD).</label>
            @csrf
            <label for="chavePix">
                Informe a Chave Pix:
                <input type="text" name="chavePix">
            </label>
            <button type="submit">Próximo</button>
            <a class="linkButton" href={{ url('/pix') }}>Cancelar</a>
        </form>
    </section>
@endsection
