<?php

namespace App\Http\Controllers;

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
    public function home(Request $request)
    {
        $firstName = 'Carlos';
        return view('home', [$firstName]);
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
        return view('pix/pagamentoPix');
    }
    public function regPix()
    {
        return view('pix/registrarPix');
    }
    public function modPix()
    {
        return view('pix/modificarPix');
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