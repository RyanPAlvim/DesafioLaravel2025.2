<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\SendMailController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produto/{id}', [HomeController::class, 'show'])->name('product.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);

    // Envio de email (checa admin no controller)
    Route::get('/sendmail', [SendMailController::class, 'form'])->name('sendmail.form');
    Route::post('/sendmail', [SendMailController::class, 'send'])->name('sendmail.send');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Histórico de Compras
    Route::get('/historico-compras', [HistoryController::class, 'compras'])->name('history.compras');
    Route::get('/historico-compras/pdf', [HistoryController::class, 'comprasPdf'])->name('history.compras.pdf');

    // Histórico de Vendas
    Route::get('/historico-vendas', [HistoryController::class, 'vendas'])->name('history.vendas');
    Route::get('/historico-vendas/pdf', [HistoryController::class, 'vendasPdf'])->name('history.vendas.pdf');
});

Route::post('/checkout', [OrderController::class, 'store'])->middleware('auth');
Route::get('/purchase-error', [OrderController::class, 'purchaseError'])->middleware('auth');


require __DIR__ . '/auth.php';
