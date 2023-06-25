<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conta;
use App\Models\Logs;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    function login(Request $request)
    {
        $loginData = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ],
            [
                'username' => 'O campo "Nome de Usuário" não pode estar vazio',
                'password' => 'A senha não pode estar em branco'
            ]
        );

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            Logs::create([
                'userID' => Auth::id(),
                'loginTime' => now('America/Sao_Paulo'),
            ]);

            return redirect('/master');
        } else {
            return redirect()->back()->withErrors([
                'username' => 'Usuário incorreto.',
                'password' => 'Senha incorreta.',
            ]);
        }
    }

    public function cadastro(Request $request)
    {
        $cadastroData = $request->validate(
            [
                'username' => ['required', 'max:15'],
                'email' => ['required'],
                'fullname' => ['required'],
                'cpf' => ['required', 'min:11'],
                'celular' => ['required', 'min:11'],
                'deposito' => ['required', 'decimal:2'],
                'password' => ['required', 'min:8', 'confirmed']
            ],
            [
                'username' => 'O campo "Nome de Usuário" não pode ser vazio.',
                'email' => 'O campo "Email" não pode ser vazio.',
                'fullname' => 'O campo "Nome Completo" não pode ser vazio.',
                'cpf' => 'O campo "CPF" está incompleto.',
                'celular' => 'O campo "Celular" está incompleto.',
                'deposito' => 'O campo "Depósito inicial" não pode ser vazio e deve conter :decimal casas decimais.',
                'password' => 'A senha deve ter pelo menos :min caracteres.',
                'password_confirmation' => 'As senhas não conferem.',
            ]
        );

        User::create([
            'username' => $cadastroData['username'],
            'email' => $cadastroData['email'],
            'fullname' => $cadastroData['fullname'],
            'cpf' => $cadastroData['cpf'],
            'celular' => $cadastroData['celular'],
            'password' => $cadastroData['password']
        ]);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
