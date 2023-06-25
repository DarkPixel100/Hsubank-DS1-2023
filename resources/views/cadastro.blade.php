@extends('layouts.template')

@section('title')
    Cadastro
@endsection

@section('main')
    <section style="justify-self: center; align-self: center; width: 60%">
        <h1 class="sectionTitle">Cadastro</h1>
        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ route('cadastro') }}" method="POST" class="fillerForm" autocomplete="off">
            @csrf
            <fieldset>
                <legend>Dados da Conta</legend>
                <label for="username">
                    Nome de Usuário:
                    <input type="text" name="username" size="16" maxlength="15" required>
                </label>

                <label for="email">
                    Email:
                    <input type="text" name="email" required>
                </label>
            </fieldset>

            <fieldset>
                <legend>Dados Pessoais</legend>
                <label for="fullname">
                    Nome Completo:
                    <input type="text" name="fullname" size="25" required>
                </label>

                <label for="cpf">
                    CPF:
                    <input type="text" name="cpf" size="14" minlength="11" maxlength="11" required>
                </label>

                <label for="celular">
                    Celular:
                    <input type="text" name="celular" size="13" minlength="11" maxlength="11" required>
                </label>
            </fieldset>


            <fieldset>
                <label for="deposito">
                    Deposito inicial:
                    <input type="text" name="deposito" required>
                </label>
            </fieldset>

            <fieldset>
            <label for="password">
                Senha:
                <input type="password" name="password" minlength="8" required>
            </label>

            <label for="password_confirmation">
                Repita a Senha:
                <input type="password" name="password_confirmation" minlength="8" required>
            </label>
            </fieldset>
            <button type="submit">Criar a conta</button>

            <a href="{{url('login')}}">Já tem uma conta?</a>
        </form>
    </section>
@endsection
