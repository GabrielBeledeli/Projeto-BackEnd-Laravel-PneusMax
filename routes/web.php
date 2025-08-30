<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PneusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para o CRUD de Pneus
    Route::get('/cadastro', [PneusController::class, 'create'])->name('pneus.create');
    Route::post('/cadastro', [PneusController::class, 'store'])->name('pneus.store');
    Route::get('/edicao/{pneu}', [PneusController::class, 'edit'])->name('pneus.edit');
    Route::put('/edicao/{pneu}', [PneusController::class, 'update'])->name('pneus.update');
    Route::delete('/excluir/{pneu}', [PneusController::class, 'destroy'])->name('pneus.destroy');
});

require __DIR__.'/auth.php';
