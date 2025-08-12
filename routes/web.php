<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return view('welcome');
});

// Rota simples para demonstração
Route::get('/hello', [HelloController::class, 'index']);
// http://localhost:8000/hello