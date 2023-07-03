<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{

    public function regPix(Request $request)
    {
        // chavePix é o nome da variavel que envia
    }
    public function pagPix(Request $request)
    {
        // idPessoa = Quem fez o pix
        // chavePix = chave do PIX da pessoa que recebe
        // qntDinheiro = Quantidade monetaria da transferencia
        // tipoTransferencia = Retorna valor ("saldo" ou "credito")
        // qntVezes = Se selecionado credito retorna ("1x" ou "2x" ou "3x")
        // comentario = cometario :D se "" -> AQUI Pag. PIX para Username da pessoas que recebeu
    }
    public function modPix($chavePix)
    {
        // chavePix é o nome da variavel que envia
    }
    
    public function pagBoleto(Request $request)
    {
        // 
    }

    public function pagDebito(Request $request)
    {
        // 
    }
}
