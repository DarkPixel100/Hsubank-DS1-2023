@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <h2>Conta Bancária</h2>
    <div>
    <div>
        <a href={{url("/pagamento")}}>Fazer Pagamentos</a>
    </div>
    <div>
        <a href={{url("/transferencia")}}>Transferencias</a>
    </div>
    <div>
        <a href={{url("/extrato")}}>Ver Extratos</a>
    </div>
    </div>
@endsection