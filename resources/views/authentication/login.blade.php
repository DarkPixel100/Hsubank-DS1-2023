@extends('layouts.template')

@section('title')
    Login
@endsection

@section('main')
    <section style="justify-self: center; align-self: center; width: 60%">
        <h1 class="sectionTitle">Login</h1>
        <form action="{{ route('login') }}" method="POST" class="fillerForm" autocomplete="off">
            @csrf
            <label for="username">
                Nome de Usuário:
                <input type="text" name="username" required>
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </label>

            <label for="password">
                Senha:
                <input type="password" name="password" required>
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </label>

            <button type="submit">Entrar</button>

            <a href="{{ url('cadastro') }}">Crie uma conta</a>
        </form>
    </section>
@endsection
