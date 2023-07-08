@extends('layouts.template')

@section('title')
    Home
@endsection

@section('main')
    <script>
        function credito(that) {
            if (that.value == "credito") {
                document.getElementById("escolhaCredito").style.display = "block";
            } else {
                document.getElementById("escolhaCredito").style.display = "none";
            }
        }
    </script>
    <section>
        <h2>Pagamento - Débito</h2>
        <form action="{{ url('/debito') }}" method="post" class="fillerForm" autocomplete="off">
            @csrf
            {{-- <input type="hidden" name="idPessoa" value="Linkar com BD"> --}}
            <label for="qntDinheiro">
                Total a pagar:
                <input type="number" name="qntDinheiro" step=".01">
            </label>
            <label for="comentario">
                Comentário:
                <input type="text" name="comentario">
            </label>
            <button type="submit">Enviar</button>
            <a class="linkButton" href={{ url('/pagamento') }}>Cancelar</a>
        </form>
    </section>
@endsection
