@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
<section>
    <h2>Área Pix</h2>
    <ul>
        <li><a href={{url("/pagPix")}}>Pagar no PIX</a></li>
        <li><a href={{url("/regPix")}}>Registrar chave PIX</a></li>
        <li><a href={{url("/modPix")}}>Modificar chave PIX</a></li>
        <a href={{url("/pagamento")}}>Voltar para Pagamentos</a>
    </ul>
</section>
@endsection
