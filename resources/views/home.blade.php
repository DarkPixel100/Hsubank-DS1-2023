@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <h1>Seja bem vindo, {{$firstName}}!</h1>
    <h2>Conta Bancária</h2>
    <div>
        <div>Saldo:  </div>
        <div>
            <a href={{url("/pagamento")}}>Pagamentos</a>
        </div>
        <div>
            <a href={{url("/transferencia")}}>Transferencias</a>
        </div>
        <div>
            <a href={{url("/extrato")}}>Ver Extratos</a>
        </div>
    </div>
@endsection
