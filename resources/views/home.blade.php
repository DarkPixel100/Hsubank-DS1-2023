@extends('layouts.template')

@section('title')
    Home
@endsection

@section('main')
    @if (Auth::check())
        <section>
            <h2 class="sectionTitle">Conta:</h2>
            <div class="accountInfo">Nº da Conta: {{ Auth::user()->contas->id }}</div>
            <div class="accountInfo">Saldo:<br>R$ {{ Auth::user()->contas->saldo }}</div>
            <div class="accountInfo">Limite:<br>R$ {{ Auth::user()->contas->limite }}</div>
        </section>
        <section>
            <h2 class="sectionTitle">Acesse:</h2>
            <ul>
                <li>
                    <a class="linkButton" href={{ url('/pagamento') }}>Pagamentos</a>
                </li>
                <li>
                    <a class="linkButton" href={{ url('/transferencia') }}>Transferências</a>
                </li>
                <li>
                    <a class="linkButton" href={{ url('/extrato') }}>Ver Extratos</a>
                </li>
            </ul>
        </section>
    @endif
@endsection
