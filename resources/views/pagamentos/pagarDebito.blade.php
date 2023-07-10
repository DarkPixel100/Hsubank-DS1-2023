@extends('layouts.template')

@section('title')
    Home
@endsection

@section('main')
    <section>
        <h2 class="sectionTitle">Pagamento - Débito</h2>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <br>
        <form action="{{ url('/debito') }}" method="post" class="fillerForm" autocomplete="off">
            @csrf
            {{-- <input type="hidden" name="idPessoa" value="Linkar com BD"> --}}
            <label for="qntDinheiro">
                Total a pagar:
                <input type="number" name="qntDinheiro" step=".01">
            </label>
            <label for="comentario">
                Comentário (ou descrição):
                <input type="text" name="comentario">
            </label>
            <button type="submit">Enviar</button>
            <a class="linkButton" href={{ url('/pagamento') }}>Cancelar</a>
        </form>
    </section>
@endsection
