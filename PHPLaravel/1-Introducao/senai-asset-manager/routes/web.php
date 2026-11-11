<?php


use App\Http\Controllers\AtivoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Rota Principal: Dashboard de Ativos Fabris
Route::get("/", [AtivoController::class, "index"])->name("ativos.index");

// Rota de status em JSON
Route::get("/status", [AtivoController::class, "status"])->name("ativos.status");

// Rotas CRUD de clientes
Route::resource("clientes", ClienteController::class)->whereNumber("clientes");

// Rota de busca por setor
Route::get("/clientes/setor/{setor?}", [ClienteController::class, "filtrarPorSetor"])
    ->name("clientes.setor")
    ->whereAlphaNumeric("setor");

// Rotas CRUD de produtos
Route::resource("produtos", ProdutoController::class);
