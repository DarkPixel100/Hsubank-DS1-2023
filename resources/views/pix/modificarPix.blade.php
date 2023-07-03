@extends('layouts.template')

@section('title')
Home
@endsection

@section ('main')
    <section>
        <h2>Área Pix - Modificar chave</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 70%;"> Chave Pix </th>
                        <th style="width: 30%;"> Chave Pix </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($var de pesquisa as $Chaves pix da pessoa ) --}}
                    <tr>
                        <td>{{-- $var de pesquisa -> chave pix --}}</td>
                        <td>
                            <!-- <form method="post" action="{{ url('modPix/deletar/'.$var de pesquisa -> chave pix)}}"> -->
                                @csrf
                                <button type="submit" name="fazer" value="excluir" class="botao-deleta rounded-circle bi bi-trash-fill"></button>
                            </form>
                        </td>
                    </tr>
                        {{-- @empty --}}
                        <tr>
                            <td colspan="5">Não existe Chave PIX nessa conta.
                            </td>
                        </tr>

                    {{-- @endforelse --}}
                </tbody>
            </table>
        <a href={{url("/pix")}}>Voltar para o Área PIX</a>
    </section>
@endsection
