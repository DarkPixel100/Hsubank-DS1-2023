<?php

namespace App\Http\Controllers;

use App\Models\ChavePix;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //View do Login
    public function login()
    {
        return view('authentication/login');
    }
    public function cadastro()
    {
        return view('authentication/cadastro');
    }

    //View da Home
    public function home()
    {
        return view('home');
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

    // View das Formas de pagar
    // Área PIX
    public function pix()
    {
        return view('pix/pix');
    }
    public function pagPix()
    {
        return view('pix/pagamentoPixInicial');
    }
    public function regPix()
    {
        return view('pix/registrarPix');
    }
    public function modPix()
    {
        return view('pix/modificarPix', ['chaves' => ChavePix::where('contaID', '=', Auth::user()->contas->id)->get()]);
    }

    //Boletos
    public function boleto()
    {
        return view('pagamentos/boleto');
    }


    //Pagar com Debito
    public function debito()
    {
        return view('pagamentos/pagarDebito');
    }

}
