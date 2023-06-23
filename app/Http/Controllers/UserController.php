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

    public function home()
    {
        return view('home');
    }
}
