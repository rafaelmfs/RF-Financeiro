<?php

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
Route::get('/listar', [FinancialTransactionController::class, 'list'])->middleware(['auth'])->name('listar');
Route::get('/relatorio', [FinancialTransactionController::class, 'report'])->middleware(['auth'])->name('relatorio');



require __DIR__.'/auth.php';
