@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <h2>Área Pix</h2>
    <div class="containerPix">
        <div class="boxPix"><a href={{url("/pagPix")}}>Pagar no PIX</a></div>
        <div class="boxPix"><a href={{url("/regPix")}}>Registrar chave PIX</a></div>
        <div class="boxPix"><a href={{url("/modPix")}}>Modificar chave PIX</a></div>
    </div>
    <div>
        <a href={{url("/pagamento")}}>Voltar para Pagamentos</a>
    </div>
@endsection
