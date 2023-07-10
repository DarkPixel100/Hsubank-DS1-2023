@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
<section>
    <h2 class="sectionTitle">Área Pix</h2>
    <ul>
        <li><a href={{url("/pagPix")}}>Pagar no PIX</a></li>
        <li><a href={{url("/regPix")}}>Registrar chave PIX</a></li>
        <li><a href={{url("/modPix")}}>Listar chaves PIX</a></li>
        <a href={{url("/pagamento") }} class="linkButton">Voltar para Pagamentos</a>
    </ul>
</section>
@endsection
