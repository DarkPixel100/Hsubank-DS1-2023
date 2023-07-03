@extends('layouts.template')
<Script>
    function credito(that) {
    if (that.value == "credito") {
        document.getElementById("escolhaCredito").style.display = "block";
    } else {
        document.getElementById("escolhaCredito").style.display = "none";
    }
}</Script>
@section('title')
Home
@endsection

@section ('main')
    <section>
        <h2>Tranferencias</h2>
            <form action="{{url("/transf")}}" method="post" class="fillerForm">
                @csrf
                <input type="hidden" name="idPessoa" value="{{--Linkar com BD--}}">
                <label for="codconta">
                    Digite o código da conta do destinatário do pagamento:
                    <input type="text" name="codconta">
                </label>
                <label for="qntDinheiro">
                    Total para transferência:
                    <input type="number" name="qntDinheiro">
                </label>
                <label for="comentario">
                    Comentário:
                    <input type="text" name="comentario">
                </label>
                <button type="submit">Enviar</button>
                <a class="linkButton" href={{url("/home")}}>Cancelar</a>
            </form>
    </section>
@endsection
