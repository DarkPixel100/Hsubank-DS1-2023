<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conta;
use App\Models\ChavePix;
use App\Models\Operacao;
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
        return view('extrato', [
            'extratos' => Operacao::where('origemID', '=', Auth::user()->contas->id)
                ->orwhere('destinoID', '=', Auth::user()->contas->id)
                ->orderby('time', 'DESC')
                ->get(),
        ]);
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
    public function findPix(Request $request)
    {
        if ($request->chavePix == null) {
            return redirect(route('pagPix'))->withErrors(['errors' => 'Precisa adicionar uma chave PIX']);
        }
        $chaveDestino = ChavePix::where('chavePix', '=', $request->chavePix)->first();
        if ($chaveDestino == null) {
            return redirect(route('pagPix'))->withErrors(['errors' => 'Conta não encontrada']);
        }
        $contaDestino = Conta::find($chaveDestino->contaID);
        $destinatario = User::find($contaDestino->userID);
        if ($destinatario == Auth::user()) {
            return redirect(route('pagPix'))->withErrors(['errors' => 'Você não pode realizar um PIX para si mesmo']);
        }
        $nome = $destinatario->firstname . ' ' . $destinatario->surname;

        return view('pix/pagamentoPixFinal')->with(['destinatario' => $nome, 'chavePix' => $request->chavePix]);
    }
    // public function findPixFinal()
    // {
    //     return view('pix/pagamentoPixFinal');
    // }
    public function regPix()
    {
        return view('pix/registrarPix');
    }
    public function modPix()
    {
        return view('pix/listarPix', ['chaves' => ChavePix::where('contaID', '=', Auth::user()->contas->id)->get()]);
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
