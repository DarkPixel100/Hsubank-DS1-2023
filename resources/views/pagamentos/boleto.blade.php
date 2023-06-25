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

    <h2>Pagar boleto</h2>
    <div class="containerBoleto">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30%;"> Data da Transferência </th>
                    <th style="width: 30%;"> Tipo de Transferência </th>
                    <th style="width: 40%;"> Comentário </th>
                    <th style="width: 30%;"> Valor </th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($var de pesquisa as $historico de transferencias da pessoa ) --}}
                <tr>
                    <td>{{-- $var de pesquisa -> Data de Transferência --}}</td>
                    <td>{{-- $var de pesquisa -> Tipo de Transferência --}}</td>
                    <td>{{-- $var de pesquisa -> Comentário --}}</td>
                    <td>{{-- $var de pesquisa -> Valor --}}</td>
                </tr>
                    {{-- @empty --}}
                    <tr>
                        <td colspan="5">Sem extratos para mostrar.
                        </td>
                    </tr>

                {{-- @endforelse --}}
            </tbody>
            <tfoot>
                <tr>
                    <td >Saldo:</td>
                    <td >{{-- $var de pesquisa -> Salto total da conta  --}}</td>
                    <td >Saldo após Fatura:</td>
                    <td >{{-- $var de pesquisa -> Salto total da conta - Crédito a pagar --}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
    <div>
        <a href={{url("pagamento/")}}>Voltar para os pagamentos</a>
    </div>
@endsection
