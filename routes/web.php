<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagamentosController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Login e Cadastro
Route::get('/', [ViewController::class, 'login']);
Route::get('/cadastro', [ViewController::class, 'cadastro']);
Route::post('/cadastro', [AuthenticationController::class, 'cadastro'])->name('cadastro');
Route::get('/login', [ViewController::class, 'login']);
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
// Route::post('master/', [UserController::class, 'validarLogin']);
Route::get('/master', [ViewController::class, 'master']);



//Master
Route::get('pagamento/', [ViewController::class, 'pagamento']);
Route::get('extrato/', [ViewController::class, 'extrato']);
Route::get('transferencia/', [ViewController::class, 'transferencia']);




// Área PIX
Route::get('pix/', [ViewController::class, 'pix']);
Route::get('/pagPix', [ViewController::class, 'pagPix']);
Route::post('/pagPix', [PagamentosControllerr::class, 'pagPix']);
Route::get('/modPix', [ViewController::class, 'modPix']);
Route::post('/modPix/deletar/{chavePix}', [PagamentosControllerr::class, 'modPix']);
Route::get('/regPix', [ViewController::class, 'regPix']);
Route::post('/regPix/', [PagamentosController::class, 'regPix']);


//Pagamentos
Route::get('/boleto', [ViewController::class, 'boleto']);
Route::post('/boleto', [PagamentosController::class, 'pagboleto']);
// Route::get('/pagamentoCartao', [ViewController::class, 'pagCartao']);
// Route::get('/pagamentoFatura', [ViewController::class, 'pagFatura']);

//ENZO VOU FAZER OS BOLETOS
