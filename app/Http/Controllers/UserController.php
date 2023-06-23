<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function cadastro()
    {
        return view('cadastro');
    }
    public function master()
    {
        return view('master');
    }
    public function validarLogin()
    {
        return view('master');
    }
        public function pagamento()
    {
        return view('pagamento');
    }
        public function extrato()
    {
        return view('extrato');
    }
        public function transferencia()
    {
        return view('transferencia');
    }
}
