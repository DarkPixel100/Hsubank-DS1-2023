<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\User;
use App\Models\ChavePix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagamentosController extends Controller
{
    public function regPix(Request $request)
    {
        // chavePix é o nome da variavel que envia
        $chavePix = $request->chavePix;
        if ($chavePix == '') {
                        return redirect(url('/regPix'))->withErrors(['errors' => 'Chave PIX não pode ser nula']);
        }
            if (
                count(
                    DB::table('chavespix')
                        ->where('chavePix', '=', $chavePix)
                        ->get(),
                ) > 0
                ) {
                    return redirect(url('/regPix'))->withErrors(['errors' => 'Chave PIX já cadastrada']);
                } else {
                    // $userID = 1;
                    $contaID = Auth::user()->contas->id;
                ChavePix::create([
                    'contaID' => $contaID,
                    'chavePix' => $chavePix,
                ]);

                return redirect('/pix')->with(['success' => 'Chave PIX cadastrada']);
            }
    }
    public function pagPix(Request $request)
    {
        $saldo = Auth::user()->contas->saldo;
        $chaveDestino = ChavePix::where('chavePix', '=', $request->chavePix)->first();
        $destinatario = Conta::find($chaveDestino->contaID);
        $saldoDestino = $destinatario->saldo;
        $qntDinheiro = $request->qntDinheiro;

        $saldo -= $qntDinheiro;
        $saldoDestino += $qntDinheiro;

        Auth::user()->contas->update([
            'saldo' => $saldo,
        ]);
        $destinatario->update([
            'saldo' => $saldoDestino,
        ]);

        return redirect('/')->with(['success' => 'PIX realizado com sucesso.']);
    }
    public function modPix(Request $request)
    {
        $chavePix = $request->chave;
        DB::table('ChavesPix')->where('chavePix', $chavePix)->delete();
        return redirect(Url('/modPix'))->with(['success' => 'Chave PIX removido com sucesso.']);
    }

    public function pagamento(Request $request)
    {
        $saldo = Auth::user()->contas->saldo;
        $qntDinheiro = $request->qntDinheiro;

        $saldo -= $qntDinheiro;

        Auth::user()->contas->update([
            'saldo' => $saldo,
        ]);

        return redirect('/')->with(['success' => 'Pagamento realizado com sucesso.']);
    }

    public function fazertransf(Request $request)
    {
        $saldo = Auth::user()->contas->saldo;
        $destinatario = Conta::find($request->codconta);
        $saldoDestino = $destinatario->saldo;
        $qntDinheiro = $request->qntDinheiro;

        $saldo -= $qntDinheiro;
        $saldoDestino += $qntDinheiro;

        Auth::user()->contas->update([
            'saldo' => $saldo,
        ]);
        $destinatario->update([
            'saldo' => $saldoDestino,
        ]);

        return redirect('/')->with(['success' => 'Tranferência realizada com sucesso.']);
    }
}
