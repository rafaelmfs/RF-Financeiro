<?php

use App\Http\Controllers\Finance\CategoriesController;
use App\Http\Controllers\Finance\FinancialAccountController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Finance\FinancialTransactionController;
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
Route::get('/adicionar', [FinancialTransactionController::class, 'add'])->middleware(['auth'])->name('adicionar');
Route::get('/adicionar/conta', [FinancialAccountController::class, 'add'])->middleware(['auth'])->name('adicionar.conta');
Route::get('/adicionar/categoria', [CategoriesController::class, 'add'])->middleware(['auth'])->name('adicionar.categoria');
Route::get('/listar', [FinancialTransactionController::class, 'list'])->middleware(['auth'])->name('listar');
Route::get('/relatorio', [FinancialTransactionController::class, 'report'])->middleware(['auth'])->name('relatorio');

//Post
Route::post('/adicionar/salvar', [FinancialTransactionController::class, 'store'])->middleware(['auth'])->name('salvar.transacao');
Route::post('adicionar/conta/salvar', [FinancialAccountController::class, 'store'])->middleware(['auth'])->name('salvar.conta-financeira');
Route::post('adicionar/categorias/salvar', [CategoriesController::class, 'store'])->middleware(['auth'])->name('salvar.categoria');


require __DIR__.'/auth.php';
