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
        <h2>Área Pix - Pagar</h2>
            <form action="{{url("/pagPix")}}" method="post" class="fillerForm">
                <label>A chave Pix é o dado que você informa aos seus contatos para receber transferências em sua conta em poucos segundos.
                    Você pode criar uma ou mais chaves, que podem ser e-mail, CPF/CNPJ e telefone (incluindo números com DD).</label>
                @csrf
                <label for="chavePix">
                    Informe a Chave Pix:
                    <input type="text" name="chavePix">
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
                <label for="chavePix">
                    Comentário:
                    <input type="text" name="comentario">
                </label>
                <button type="submit">Enviar</button>
                <a class="linkButton" href={{url("/pix")}}>Cancelar</a>
            </form>
        </section>
@endsection
