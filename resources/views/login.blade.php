@extends('layouts.template')

@section('title')
    Login
@endsection

@section('main')
    <h2>Login</h2>
    <section>
        <form action="" method="get">
            <label for="user">Nome de Usuário</label>
            <input type="text" name="user">

            <label for="password">Senha</label>
            <input type="text" name="password">

            <button type="submit">Login</button>

            <a href="{{url('cadastro')}}">Crie uma conta</a>
        </form>
    </section>
@endsection
