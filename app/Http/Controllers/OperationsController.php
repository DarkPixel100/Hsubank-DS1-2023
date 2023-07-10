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
            'comentario' => $comentario,
            'time' => now('America/Sao_Paulo'),
        ]);
    }

    public function regPix(Request $request)
    {
        $chavePix = $request->chavePix;
        if ($chavePix == '' || $chavePix == null) {
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

            return redirect(url('/pix'))->with(['success' => 'Chave PIX cadastrada com sucesso!']);
        }
    }

    public function pagPix(Request $request)
    {
        $chaveDestino = ChavePix::where('chavePix', '=', $request->chavePix)->first();
        $saldo = Auth::user()->contas->saldo;
        $limite = Auth::user()->contas->limite;

        $destinatario = Conta::find($chaveDestino->contaID);
        $saldoDestino = $destinatario->saldo;

        $qntDinheiro = $request->qntDinheiro / ($request->tipoTransferencia == 'credito' ? $request->qntVezes : 1);

        if ($request->tipoTransferencia == 'credito' && ($qntDinheiro <= $saldo || ($qntDinheiro - $saldo) * 1.01 <= $limite)) {
            if ($qntDinheiro >= $saldo) {
                $limite -= ($qntDinheiro - $saldo) * 1.01;
                $saldo = 0;
                $saldoDestino += $qntDinheiro;
            } else {
                $saldo -= $qntDinheiro;
            }
            $tipoDePix = 'PIX - Crédito ' . $request->qntVezes . 'x';
        } elseif ($request->tipoTransferencia == 'saldo' && $qntDinheiro <= $saldo) {
            $saldo -= $qntDinheiro;
            $tipoDePix = 'PIX';
        } else {
            return redirect(route('pagPix'))->withErrors(['errors' => 'Você não tem dinheiro para realizar essa operação']);
        }

        Auth::user()->contas->update([
            'saldo' => $saldo,
        ]);
        Auth::user()->contas->update([
            'limite' => $limite,
        ]);
        $destinatario->update([
            'saldo' => $saldoDestino,
        ]);

        $request->comentario ? ($comentario = $request->comentario) : ($comentario = '');

        OperationsController::registrar($tipoDePix, Auth::user()->contas->id, $destinatario->id, $qntDinheiro, $comentario);
        return redirect('/')->with(['success' => 'PIX realizado com sucesso.', 'testvar' => Auth::user()->contas]);
    }
    public function modPix(Request $request)
    {
        $chavePix = $request->chave;
        DB::table('ChavesPix')
            ->where('chavePix', $chavePix)
            ->delete();
        return redirect(url('/modPix'))->with(['success' => 'Chave PIX removido com sucesso.']);
    }

    public function pagamento(Request $request)
    {
        $saldo = Auth::user()->contas->saldo;
        $limite = Auth::user()->contas->limite;
        $qntDinheiro = $request->qntDinheiro / ($request->tipoTransferencia == 'credito' ? $request->qntVezes : 1);
        if ($request->tipoTransferencia == 'credito' && ($qntDinheiro <= $saldo || ($qntDinheiro - $saldo) * 1.01 <= $limite)) {
            $tipoDePagamento = 'Pagamento - Crédito ' . $request->qntVezes . 'x';
            if ($qntDinheiro >= $saldo) {
                $qntDinheiro -= $saldo;
                $saldo = 0;
                $limite -= ($qntDinheiro - $saldo) * 1.01;
            } else {
                $saldo -= $qntDinheiro;
            }
        } elseif ($request->tipoTransferencia == 'debito' || $request->tipoTransferencia == '') {
            $saldo -= $qntDinheiro;
            $tipoDePagamento = 'Pagamento';
        } else {
            return redirect()
                ->back()
                ->withErrors(['errors' => 'Você não tem dinheiro para realizar essa operação']);
        }
        Auth::user()->contas->update([
            'saldo' => $saldo,
        ]);

        Auth::user()->contas->update([
            'limite' => $limite,
        ]);

        $request->comentario ? ($comentario = $request->comentario) : ($comentario = '');

        OperationsController::registrar($tipoDePagamento, Auth::user()->contas->id, 99999999, $qntDinheiro, $comentario);
        return redirect('/')->with(['success' => 'Pagamento realizado com sucesso.']);
    }

    public function fazertransf(Request $request)
    {
        $saldo = Auth::user()->contas->saldo;
        $qntDinheiro = $request->qntDinheiro;
        $destinatario = Conta::find($request->codconta);
        if ($destinatario == null) {
            return redirect(route('transferencia'))->withErrors(['errors' => 'Conta não encontrada']);
        }
        $saldoDestino = $destinatario->saldo;
        $limite = Auth::user()->contas->limite;
        if ($destinatario == ' ' || $destinatario == null) {
            return redirect()
                ->back()
                ->withErrors(['errors' => 'Destinatário Inválido']);
        }
        if ($qntDinheiro <= $saldo) {
            $tipoDeTransferencia = 'Transferência';
            $saldo -= $qntDinheiro;
            $saldoDestino += $qntDinheiro;
        } else {
            return redirect()
                ->back()
                ->withErrors(['errors' => 'Você não tem dinheiro para realizar essa operação']);
        }

        Auth::user()->contas->update([
            'saldo' => $saldo,
        ]);
        Auth::user()->contas->update([
            'limite' => $limite,
        ]);
        $destinatario->update([
            'saldo' => $saldoDestino,
        ]);

        $request->comentario ? ($comentario = $request->comentario) : ($comentario = '');

        OperationsController::registrar($tipoDeTransferencia, Auth::user()->contas->id, $request->codconta, $qntDinheiro, $comentario);

        return redirect('/')->with(['success' => 'Tranferência realizada com sucesso.']);
    }

    function resetAll()
    {
        User::find(1)->contas->update([
            'saldo' => 1000,
            'limite' => 1000,
        ]);
        User::find(2)->contas->update([
            'saldo' => 1000,
            'limite' => 1000,
        ]);
        User::find(3)->contas->update([
            'saldo' => 1000,
            'limite' => 1000,
        ]);
    }
}
