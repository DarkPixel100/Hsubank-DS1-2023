@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <h2>Extrato</h2>
    <section>
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
                <!-- forelse ($var de pesquisa as $historico de transferencias da pessoa ) -->
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
        <a class="linkButton" href={{url("/home")}}>Cancelar</a>
    </section>
@endsection
