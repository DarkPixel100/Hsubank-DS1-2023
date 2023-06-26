@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <h2>Pagamento</h2>
    <div class="containerPagamentos">
        <div class="boxPagamentos">
            <a href={{url("/pix")}}>Área Pix</a>
        </div>
        <div class="boxPagamentos">
            <a href={{url("/boleto")}}>Boletos</a>
        </div>
        <div class="boxPagamentos">
            <a href={{url("/pagamentoCartao")}}>Pagar com Cartão</a>
        </div>
        <div class="boxPagamentos">
            <a href={{url("/pagamentoFatura")}}>Pagar Fatura</a>
        </div>
    </div>
    <div>
        <a href={{url("/home")}}>Voltar para a página inicial</a>
    </div>
@endsection
