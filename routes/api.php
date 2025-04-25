<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Https\Middleware\CheckUserRole;

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth', 'role:candidato'])->group(function () {
     Route::get('/candidato/dashboard', function () {
         return response()->json(['message' => 'Bem-vindo à área do candidato!']);
     });
 });
 Route::middleware(['auth', 'role:admin'])->group(function () {
     Route::get('/admin/dashboard', function () {
         return response()->json(['message' => 'Bem-vindo à área do administrador!']);
     });
 });