<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\User;
use App\Models\ChavePix;
use App\Models\Operacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class OperationsController extends Controller
{
    public function registrar($tipo, $origem, $destino, $valor, $comentario)
    {
        Operacao::create([
            'tipo' => $tipo,
            'origemID' => $origem,
            'destinoID' => $destino,
            'valor' => $valor,
            'comentario' => $comentario
        ]);
    }

    public function regPix(Request $request)
    {
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
            $contaID = Auth::user()->contas->id;
            ChavePix::create([
                'contaID' => $contaID,
                'chavePix' => $chavePix,
            ]);

            return redirect('/pix')->with(['success' => 'Chave PIX cadastrada']);
        }
    }

    public function findPix(Request $request)
    {
        $chaveDestino = ChavePix::where('chavePix', '=', $request->chavePix)->first();
        $contaDestino = Conta::find($chaveDestino->contaID);
        $destinatario = User::find($contaDestino->userID);
        $nome = $destinatario->firstname . ' ' . $destinatario->surname;

        return view('pix/pagamentoPixFinal', ['destinatario' => $nome, 'chavePix' => $request->chavePix]);
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

        OperationsController::registrar('PIX', Auth::user()->contas->id, $destinatario->id, $qntDinheiro, $request->comentario);
        return redirect('/')->with(['success' => 'PIX realizado com sucesso.']);
    }
    public function modPix(Request $request)
    {
        $chavePix = $request->chave;
        DB::table('ChavesPix')->where('chavePix', $chavePix)->delete();
        return redirect(url('/modPix'))->with(['success' => 'Chave PIX removido com sucesso.']);
    }

    public function pagamento(Request $request)
    {
        $saldo = Auth::user()->contas->saldo;
        $qntDinheiro = $request->qntDinheiro;

        $saldo -= $qntDinheiro;

        Auth::user()->contas->update([
            'saldo' => $saldo,
        ]);

        OperationsController::registrar('Pagamento', Auth::user()->contas->id, 'EMPRESA-EXEMPLO', $qntDinheiro, $request->comentario);
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

        OperationsController::registrar('Transferência', Auth::user()->contas->id, $request->codconta, $qntDinheiro, $request->comentario);
        return redirect('/')->with(['success' => 'Tranferência realizada com sucesso.']);
    }
}
