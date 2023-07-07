@extends('layouts.template')

@section('title')
    Cadastro
@endsection

@section('main')
    <section style="justify-self: center; align-self: center; width: 60%">
        <h1 class="sectionTitle">Cadastro</h1>
        @if (count($errors) > 0)
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
                <label for="firstname">
                    Nome:
                    <input type="text" name="firstname" size="25" required pattern="/^[a-zA-Z][\sa-zA-Z]*$/">
                </label>
                <label for="surname">
                    Sobrenome:
                    <input type="text" name="surname" size="25" required pattern="/^[a-zA-Z][\sa-zA-Z]*$/">
                </label>

                <label for="cpf">
                    CPF:
                    <input type="text" name="cpf" size="14" minlength="14" maxlength="14"
                        pattern="[0-9]+\.[0-9]+\.[0-9]+-[0-9]+" required
                        oninput="
                            if(this['value'].length > 3 && this['value'][3] != '.') {
                                this['value'] = this['value'].slice(0,3) + '.' + this['value'].slice(3);
                            }
                            if(this['value'].length > 7 && this['value'][7] != '.') {
                                this['value'] = this['value'].slice(0,7) + '.' + this['value'].slice(7);
                            }
                            if(this['value'].length > 11 && this['value'][11] != '-') {
                                this['value'] = this['value'].slice(0,11) + '-' + this['value'].slice(11);
                            }"
                        onkeypress="
                            if(isNaN(parseInt(event.key))) {
                                event.preventDefault();
                            }
                        ">
                </label>

                <label for="celular">
                    Celular:
                    <input type="text" name="celular" size="11" minlength="11" maxlength="11" required
                        onkeypress="
                            if(isNaN(parseInt(event.key))) {
                                event.preventDefault();
                            }
                        ">
                </label>
            </fieldset>


            <fieldset>
                <label for="deposito">
                    Depósito inicial:
                    <input type="text" name="deposito" pattern="[0-9]+\.[0-9]+" required>
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
            <button type="submit">Criar conta</button>

            <a href="{{ url('login') }}">Já tem uma conta?</a>
        </form>
    </section>
@endsection
