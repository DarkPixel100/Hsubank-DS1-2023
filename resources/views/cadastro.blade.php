@extends('layouts.template')

@section('title')
    Cadastro
@endsection

@section('main')
    <h2>Cadastro</h2>
    <section>
        <form action="" method="post">
            <label for="user">Nome de Usuário</label>
            <input type="text" name="user">

            <label for="user">CPF</label>
            <input type="text" name="user">

            <label for="password">Senha</label>
            <input type="text" name="password">
            <label for="password">Repita a Senha</label>
            <input type="text" name="password">

            <button type="submit">Criar a Conta</button>

            <a href="{{url('login')}}">Já tem uma conta?</a>
        </form>
    </section>
@endsection
