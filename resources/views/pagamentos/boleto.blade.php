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
            <h2>Pagamento - Boleto</h2>
            <form action="{{url("/boleto")}}" method="post" class="fillerForm">
                @csrf
                <input type="hidden" name="idPessoa" value="{{--Linkar com BD--}}">
                <label for="codBar">
                    Digite o código de barras do boleto para pagamento:
                    <input type="text" name="codBra">
                </label>
                <label for="qntDinheiro">
                    Total a pagar:
                    <input type="number" name="qntDinheiro">
                </label>
                    <label for="tipoTransferencia">Transferindo com:
                    <input type="radio" name="tipoTransferencia" value="saldo">
                        <label>Saldo da conta</label>
                    <input type="radio" name="tipoTransferencia" value="credito" onchange="credito(this);">
                        <label>Crédito</label>
                        <div id="escolhaCredito" style="display: none; " >
                            <select name="qntVezes">
                                <option value="1x">1x de VALOR</option>
                                <option value="2x">2x de VALOR</option>
                                <option value="3x">3x de VALOR</option>
                            </select>
                        </div>
                    </label>
                <label for="comentario">
                    Comentário:
                    <input type="text" name="comentario">
                </label>
                <button type="submit">Enviar</button>
                <a class="linkButton" href={{url("/pagamentos")}}>Cancelar</a>
            </form>
    </section>
@endsection
