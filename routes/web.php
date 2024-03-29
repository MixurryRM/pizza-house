<?php

use App\Models\Pizzas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\VariousController;

Route::get('/', function () {
    return view('welcome');
});

//Pizza Ordering From Users
Route::prefix('pizzas')->middleware(['auth','check.user'])->group(function () {
    Route::get('/order', [PizzaController::class, 'order'])->name('pizzas.order');
    Route::post('/', [PizzaController::class, 'store'])->name('pizzas.store');
});
Route::prefix('pizzas')->middleware(['auth','check.noneUser'])->group(function () {
    Route::get('/', [PizzaController::class, 'index'])->name('pizzas.index');
    Route::get('/{id}/delete', [PizzaController::class, 'delete'])->name('pizzas.destory');
    Route::get('/{id}', [PizzaController::class, 'show'])->name('pizzas.show');
});

//Pizzas Various Creation
Route::prefix('various')->middleware('auth','check.manager')->group(function () {
    Route::get('/create', [VariousController::class, 'createPage'])->name('various.createPage');
    Route::post('/type/create', [VariousController::class, 'type'])->name('various.type');
    Route::post('/base/create', [VariousController::class, 'base'])->name('various.base');
    Route::post('/topping/create', [VariousController::class, 'topping'])->name('various.topping');
});

//User Management
Route::prefix('users')->middleware('auth','check.manager')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/change/role', [UserController::class, 'changeRole'])->name('users.changeRole');
});

//Authentication & Autorization
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage']);
    Route::get('/register', [AuthController::class, 'registerPage']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

