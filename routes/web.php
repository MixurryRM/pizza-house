<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PizzaController;
use App\Models\Pizzas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('pizzas')->group(function () {
    Route::get('/', [PizzaController::class, 'index'])->name('pizzas.index')->middleware('auth');
    Route::get('/create', [PizzaController::class, 'create'])->name('pizzas.create');
    Route::post('/', [PizzaController::class, 'store'])->name('pizzas.store');

    Route::middleware(['auth'])->group(function () {
        Route::get('/{id}/delete', [PizzaController::class, 'delete'])->name('pizzas.destory');
        Route::get('/{id}', [PizzaController::class, 'show'])->name('pizzas.show');
    });
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage']);
    Route::get('/register', [AuthController::class, 'registerPage']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

