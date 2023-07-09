@extends('layouts.template')

@section('title')
    Transferências
@endsection

@section('main')
    <section>
        <h2 class="sectionTitle">Tranferências</h2>
        <form action="{{ route('transferencia') }}" method="post" class="fillerForm" autocomplete="off">
            @csrf
            <input type="hidden" name="idPessoa" value="{{-- Linkar com BD --}}">
            <label for="codconta">
                Digite o código da conta do destinatário do pagamento:
                <input type="text" name="codconta">
            </label>
            <label for="qntDinheiro">
                Total para transferência:
                <input type="number" name="qntDinheiro" min="0" step=".01">
            </label>
            <label for="comentario">
                Comentário (ou descrição):
                <input type="text" name="comentario">
            </label>
            <button type="submit">Enviar</button>
            <a class="linkButton" href={{ url('/home') }}>Cancelar</a>
        </form>
    </section>
@endsection
