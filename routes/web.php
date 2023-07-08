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

Route::controller(ViewController::class)->group(
    function () {
        Route::get('/cadastro', [ViewController::class, 'cadastro']);
        Route::get('/login', [ViewController::class, 'login']);
    }
);

Route::controller(ViewController::class)->group(function () {
    Route::post('/cadastro', [AuthenticationController::class, 'cadastro'])->name('cadastro');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth']], function () {

    Route::controller(ViewController::class)->group(function () {
        Route::get('/', [ViewController::class, 'home']);
        Route::get('/home', [ViewController::class, 'home']);

        Route::get('pagamento/', [ViewController::class, 'pagamento']);
        Route::get('extrato/', [ViewController::class, 'extrato']);
        Route::get('transferencia/', [ViewController::class, 'transferencia']);

        Route::get('pix/', [ViewController::class, 'pix']);
        Route::get('/pagPix', [ViewController::class, 'pagPix']);

        Route::get('/modPix', [ViewController::class, 'modPix']);
        Route::post('/modPix', [PagamentosController::class, 'modPix']);
        Route::get('/regPix', [ViewController::class, 'regPix']);

        Route::get('/boleto', [ViewController::class, 'boleto']);
        Route::get('/debito', [ViewController::class, 'debito']);
    });

    Route::controller(PagamentosController::class)->group(function () {
        Route::post('/pagPix', [PagamentosController::class, 'pagPix'])->name('pagPix');
        Route::post('/regPix', [PagamentosController::class, 'regPix']);

        Route::post('/boleto', [PagamentosController::class, 'pagamento']);
        Route::post('/debito', [PagamentosController::class, 'pagamento']);

        Route::post('transferencia/', [PagamentosController::class, 'fazertransf'])->name('transferencia');
    });
});
