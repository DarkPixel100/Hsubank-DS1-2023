@extends('layouts.template')

@section('title')
    Home
@endsection

@section('main')
    <section>
        <h2 class="sectionTitle">Extrato</h2>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 20%;"> Data da Transferência </th>
                    <th style="width: 30%;"> Tipo de Transferência </th>
                    <th style="width: 30%;"> Comentário </th>
                    <th style="width: 20%;"> Valor </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($extratos as $extrato)
                    <tr>
                        <td>{{ date_format($extrato->time,"d/m/Y"); }}</td>
                        <td>{{ $extrato->tipo }}</td>
                        <td>{{ $extrato->comentario }}</td>
                        <td>
                            @if ($extrato->destinoID == Auth::user()->contas->id)
                                <span style="color: var(--positive)">+R$ {{ $extrato->valor }}</span>
                            @else
                                <span style="color: var(--negative)">-R${{ $extrato->valor }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">Sem extratos para mostrar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td>Saldo:</td>
                    <td>R$ {{ number_format(Auth::user()->contas->saldo, 2) }}</td>
                    <td>Saldo após Fatura:</td>
                    <td>R$ {{ number_format((Auth::user()->contas->saldo - (1000.00 - Auth::user()->contas->limite )), 2) }}</td>
                </tr>
            </tfoot>
        </table>
        <a class="linkButton" href={{ url('/home') }}>Cancelar</a>
    </section>
@endsection
