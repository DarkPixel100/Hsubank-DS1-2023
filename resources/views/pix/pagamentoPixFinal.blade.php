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

        function parcela(input) {
            let options = document.getElementById("escolhaCredito").children[0].children;
            for (option of options) {
                option.innerHTML = option.innerHTML.slice(0, option.innerHTML.indexOf('$') + 1) + (input.value / parseInt(option.innerHTML[0])).toFixed(2);
            }
        }
    </script>
    <section>
        <h2 class="sectionTitle">Área Pix - Pagar</h2>
        <form action="{{ url('/pagPix') }}" method="post" class="fillerForm" autocomplete="off">
            @csrf
            <p>Pagar para {{ $destinatario }}</p>
            <input type="text" name="chavePix" value="{{ $chavePix }}" hidden>
            <label for="qntDinheiro">
                Total a pagar:
                <input type="number" name="qntDinheiro" step=".01" onchange="parcela(this)">
            </label>
            <label for="tipoTransferencia">Transferindo com:
                <label class="radioLabel">Saldo da conta
                    <input type="radio" name="tipoTransferencia" value="saldo" required>
                </label>
                <label class="radioLabel">Crédito
                    <input type="radio" name="tipoTransferencia" value="credito" required onchange="credito(this);">
                    <div id="escolhaCredito" style="display: none; ">
                        <select name="qntVezes">
                            <option value="1">1x de R$0,00</option>
                            <option value="2">2x de R$0,00</option>
                            <option value="3">3x de R$0,00</option>
                        </select>
                    </div>
                </label>
            </label>
            <label for="chavePix">
                Comentário (ou descrição):
                <input type="text" name="comentario">
            </label>
            <button type="submit">Enviar</button>
            <a class="linkButton" href={{ url('/pix') }}>Cancelar</a>
        </form>
    </section>
@endsection
