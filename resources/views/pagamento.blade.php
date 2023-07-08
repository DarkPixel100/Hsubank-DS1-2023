@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <section>
        <h2 class="sectionTitle">Pagamento</h2>
        <ul>
            <li>
                <a class="linkButton" href={{url("/pix")}}>Área Pix</a>
            </li>
            <li>
                <a class="linkButton" href={{url("/boleto")}}>Boletos</a>
            </li>
            <li>
                <a class="linkButton" href={{url("/debito")}}>Pagar por Débito</a>
            </li>
            <a class="linkButton" href={{url("/home")}}>Cancelar</a>
        </ul>
    </section>
@endsection
