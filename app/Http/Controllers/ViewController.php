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

    //View do Master
    public function master()
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


    //Pagar com Cartão| Crédito e Debito
    public function pagCartao()
    {
        return view('pagamentos/pagarCartao');
    }

    //Pagar Fatura
    public function pagFatura()
    {
        return view('pagamentos/pagarFatura');
    }
}
