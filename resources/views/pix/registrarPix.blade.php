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
            @php
                $cadastradas = [];
                $chavesTable = Auth::user()->contas->chaves->toArray();
                foreach ($chavesTable as $chaveRow) {
                    array_push($cadastradas, $chaveRow['chavePix']);
                }
                $options = array_diff([Auth::user()->email, Auth::user()->cpf, Auth::user()->celular], $cadastradas);
            @endphp
            @if (sizeof($options) > 0)
                <label for="chavePix">
                    Chave Pix:
                    <select name="chavePix">
                        @foreach ($options as $chave)
                            <option value="{{ $chave }}">{{ $chave }}</option>
                        @endforeach
                    </select>
                </label>
                <button type="submit">Enviar</button>
            @else
                <h3>Você não pode mais registrar chaves pix</h3>
            @endif
            <a class="linkButton" href={{ url('/pix') }}>Cancelar</a>
        </form>
    </section>
@endsection
