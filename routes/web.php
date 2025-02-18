<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

// Route Auth
// Middleware para evitar que un usuario autenticado acceda a la vista de login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
    
});

Route::get('/logout', [AuthController::class, 'getLogout'])->name('logout');
