<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::get('/pedidos', [PedidoController::class, 'GetPedidos']);
    Route::post('/pedidos', [PedidoController::class, 'CreatePedido']);

});

