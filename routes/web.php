<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RetirosController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\DepositosController;
use App\Http\Controllers\MovimientosController;

Route::get('/', function () {
    return view('home');
});


Route::get('/register', [RegisterController::class,'create'])->name('register.index');
Route::post('/register', [RegisterController::class,'store'])->name('register.store');

Route::get('/login', [SesionController::class,'create'])->name('login.index');
Route::post('/login', [SesionController::class,'store'])->name('login.store');

Route::get('/datos', [RegisterController::class, 'datos'])->name('datos');

Route::get('/logout', [SesionController::class, 'destroy'])->name('login.home');

Route::put('/user/update', [RegisterController::class, 'update'])->name('user.update');


Route::get('/retiros', [RetirosController::class, 'index'])->name('retiros.index');
Route::post('/retiros', [RetirosController::class, 'store'])->name('retiros.store');


Route::get('/depositos', [DepositosController::class, 'index'])->name('depositos.index');
Route::post('/depositos', [DepositosController::class, 'store'])->name('depositos.store');

Route::get('/movimientos', [MovimientosController::class, 'index'])->name('movimientos.index');
