@extends('layouts.template')

@section('title')
    Login
@endsection

@section('main')
    <section style="justify-self: center; align-self: center; width: 60%">
        <h1 class="sectionTitle">Login</h1>
        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ route("login") }}" method="POST" class="fillerForm" autocomplete="off">
            @csrf
            <label for="username">
                Nome de Usuário:
                <input type="text" name="username" required>
            </label>

            <label for="password">
                Senha:
                <input type="password" name="password" required>
            </label>

            <button type="submit">Entrar</button>

            <a href="{{url('cadastro')}}">Crie uma conta</a>
        </form>
    </section>
@endsection
