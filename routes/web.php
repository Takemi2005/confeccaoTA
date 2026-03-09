<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutosController;


// rota para mostrar o formulario
Route::get('/clientes/create', [ClientesController::class,'create']) ->name('clientes.create');
Route::resource('estoque', EstoqueController::class);
Route::resource('fornecedores', FornecedoresController::class);
Route::resource('pedidos', PedidosController::class);
Route::resource('produtos', EstoqueController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');

Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
