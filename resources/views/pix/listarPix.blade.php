@extends('layouts.template')

@section('title')
    Home
@endsection
@section('main')
    <section>
        <h2 class="sectionTitle">Área Pix - Listar chaves</h2>
        <table>
            <thead>
                <tr>
                    <th>Chave Pix</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($chaves as $chave)
                    <tr>
                        <td> {{ $chave->chavePix }}</td>
                        <td>
                            <form method="post" action="{{ url('modPix') }}">
                                @csrf
                                <button type="submit" value="{{ $chave->chavePix }}" name="chave">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Não existe Chave PIX nessa conta.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href={{ url('/pix') }} class="linkButton">Voltar para o Área PIX</a>
    </section>
@endsection
