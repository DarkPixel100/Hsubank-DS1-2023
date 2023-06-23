<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'login']);
Route::get('/cadastro', [UserController::class, 'cadastro']);
Route::get('/login', [UserController::class, 'login']);
Route::post('master/', [UserController::class, 'validarLogin']);
Route::get('/master', [UserController::class, 'master']);
Route::get('pagamento/', [UserController::class, 'pagamento']);
Route::get('extrato/', [UserController::class, 'extrato']);
Route::get('transferencia/', [UserController::class, 'transferencia']);