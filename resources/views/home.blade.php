@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <section>
        <h2>Conta Bancária</h2>
        @if (Auth::check())
            <ul>
                <li>Saldo: {{Auth::user()->contas->saldo}}</li>
                <li>
                    <a href={{url("/pagamento")}}>Pagamentos</a>
                </li>
                <li>
                    <a href={{url("/transferencia")}}>Transferencias</a>
                </li>
                <li>
                    <a href={{url("/extrato")}}>Ver Extratos</a>
                </li>
            </ul>
        @endif
    </section>
@endsection
