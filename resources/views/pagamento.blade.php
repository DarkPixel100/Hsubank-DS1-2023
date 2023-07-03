@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <section>
        <h2>Pagamento</h2>
        <ul>  
            <li>
                <a href={{url("/pix")}}>Área Pix</a>
            </li>
            <li>
                <a href={{url("/boleto")}}>Boletos</a>
            </li>
            <li>
                <a href={{url("/debito")}}>Pagar por Débito</a>
            </li>
            <a class="linkButton" href={{url("/home")}}>Cancelar</a>
        </ul>
    </section>
@endsection
