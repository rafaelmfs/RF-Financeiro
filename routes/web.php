<?php

use App\Http\Controllers\Finance\CategoriesController;
use App\Http\Controllers\Finance\FinancialAccountController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Finance\FinancialTransactionController;
use App\Http\Controllers\Finance\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.home');
})->name('site.home');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/adicionar', [FinancialTransactionController::class, 'inserir'])->middleware(['auth'])->name('adicionar');
Route::get('/adicionar.conta', [FinancialAccountController::class, 'inserir'])->middleware(['auth'])->name('adicionar.conta');
Route::get('/adicionar.categoria', [CategoriesController::class, 'inserir'])->middleware(['auth'])->name('adicionar.categoria');

Route::get('/consultar', function(){
    return view('app.consultar.consultar');
})->middleware(['auth'])->name('consultar');
Route::get('/categorias.listar', [CategoriesController::class, 'listar'])->middleware(['auth'])->name('categorias.listar');
Route::get('/contas.listar', [FinancialAccountController::class, 'listar'])->middleware(['auth'])->name('contas.listar');
Route::get('/movimentacoes.listar', [FinancialTransactionController::class, 'consultar'])->middleware(['auth'])->name('movimentacoes.listar');
Route::get('/movimentaco.editar', [FinancialTransactionController::class, 'formEditar'])->middleware(['auth'])->name('editarForm.movimentacao');
Route::get('/movimentaco.exibir/{movimentacao}', [FinancialTransactionController::class, 'exibir'])->middleware(['auth'])->name('exibir.movimentacao');
Route::get('/relatorio', [ReportController::class, 'relatorios'])->middleware(['auth'])->name('relatorios');
Route::get('/relatorio/categorias', /*[ReportController::class, 'relatorios']*/ function(){
    return view('app.relatorio.categorias');
})->middleware(['auth'])->name('relatorio.categorias');
Route::get('/relatorio/conta-financeira', /*[ReportController::class, 'relatorios']*/ function(){
    return view('app.relatorio.conta');
})->middleware(['auth'])->name('relatorio.conta');
Route::get('/relatorio/movimentacoes', /*[ReportController::class, 'relatorios']*/ function(){
    return view('app.relatorio.movimentacoes');
})->middleware(['auth'])->name('relatorio.movimentacoes');


//Post
Route::post('/adicionar/salvar', [FinancialTransactionController::class, 'salvar'])->middleware(['auth'])->name('salvar.transacao');
Route::post('adicionar/conta/salvar', [FinancialAccountController::class, 'salvar'])->middleware(['auth'])->name('salvar.conta-financeira');
Route::post('adicionar/categorias/salvar', [CategoriesController::class, 'salvar'])->middleware(['auth'])->name('salvar.categoria');
Route::post('/movimentacoes.listar', [FinancialTransactionController::class, 'consultarFiltro'])->middleware(['auth'])->name('movimentacoes.listar');

//Put
Route::put('/editar/categoria/{categoria}', [CategoriesController::class, 'editar'])->middleware(['auth'])->name('editar.categoria');
Route::put('/editar/contaFinanceira/{conta}', [FinancialAccountController::class, 'editar'])->middleware(['auth'])->name('editar.conta');
Route::put('/editar/movimentacao/{movimentacao}', [FinancialTransactionController::class, 'editar'])->middleware(['auth'])->name('editar.movimentacao');


//Delete
Route::delete('/apagar/categoria/{categoria}', [CategoriesController::class, 'apagar'])->middleware(['auth'])->name('apagar.categoria');
Route::delete('/apagar/conta/{conta}', [FinancialAccountController::class, 'apagar'])->middleware(['auth'])->name('apagar.conta');
Route::delete('/apagar/movimentacao/{movimentacao}', [FinancialTransactionController::class, 'apagar'])->middleware(['auth'])->name('apagar.movimentacao');


require __DIR__.'/auth.php';
