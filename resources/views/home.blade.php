@extends('layouts.template')

@section('title')
    Home
@endsection

@section('main')
    @if (Auth::check())
        <section>
            <h2>Conta Bancária</h2>
            <div id="saldo">Saldo:<br>{{ Auth::user()->contas->saldo }}</div>
        </section>
        <section>
            <h2>Acesse:</h2>
            <ul>
                <li>
                    <a href={{ url('/pagamento') }}>Pagamentos</a>
                </li>
                <li>
                    <a href={{ url('/transferencia') }}>Transferencias</a>
                </li>
                <li>
                    <a href={{ url('/extrato') }}>Ver Extratos</a>
                </li>
            </ul>
        </section>
    @endif
@endsection
