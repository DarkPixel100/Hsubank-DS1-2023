@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <h2>Área Pix - Registrar</h2>
    <div class="containerPix">
        <form action="{{url("/regPix")}}" method="post" class="fillerForm">
            <label>A chave Pix é o dado que você informa aos seus contatos para receber transferências em sua conta em poucos segundos.
                Você pode criar uma ou mais chaves, que podem ser e-mail, CPF/CNPJ e telefone (incluindo números com DD).</label>
            @csrf
            <label for="chavePix">
                Chave Pix:
                <input type="text" name="chavePix">
            </label>

            <button type="submit">Enviar</button>

        </form>
    </div>
    <div>
        <a href={{url("/pix")}}>Voltar para o Área PIX</a>
    </div>
@endsection
