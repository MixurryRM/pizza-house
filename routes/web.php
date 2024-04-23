<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\VariousController;

Route::get('/', function () {
    return view('welcome');
});

//Pizza Ordering From Users
Route::prefix('pizzas')->middleware(['auth', 'check.user'])->group(function () {
    Route::get('/order', [PizzaController::class, 'order'])->name('pizzas.order');
    Route::post('/', [PizzaController::class, 'store'])->name('pizzas.store');
});

//Pizzas Ordering Management
Route::prefix('pizzas')->middleware(['auth', 'check.noneUser'])->group(function () {
    Route::get('/{id}/delete', [PizzaController::class, 'delete'])->name('pizzas.destory');
    Route::get('/{id}', [PizzaController::class, 'show'])->name('pizzas.show');
});

//Pizzas Various Creation
Route::prefix('various')->middleware('auth', 'check.manager')->group(function () {
    Route::get('/create', [VariousController::class, 'createPage'])->name('various.createPage');
    Route::post('/type/create', [VariousController::class, 'type'])->name('various.type');
    Route::post('/base/create', [VariousController::class, 'base'])->name('various.base');
    Route::post('/topping/create', [VariousController::class, 'topping'])->name('various.topping');
});

//User Management
Route::prefix('users')->middleware('auth', 'check.manager')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/change/role', [UserController::class, 'changeRole'])->name('users.changeRole');
    Route::get('/switch/role', [UserController::class, 'switchRole'])->name('users.switchRole');
});
Route::get('users/pizzaIndex', [UserController::class, 'pizzaIndex'])->name('users.pizzaIndex')->middleware('auth', 'check.noneUser');

//Account Management
Route::prefix('accounts')->middleware('auth')->group(function () {
    Route::get('/index',[AccountController::class,'index'])->name('accounts.index');
    Route::get('/editPage',[AccountController::class,'editPage'])->name('accounts.editPage');
    Route::post('{id}/update',[AccountController::class,'update'])->name('accounts.update');
    Route::get('/changePasswordPage',[AccountController::class,'changePasswordPage'])->name('account.changePasswordPage');
    Route::post('/{id}/changePassword',[AccountController::class,'changePassword'])->name('account.changePassword');
});

//User Reviews
Route::prefix('reviews')->middleware(['auth', 'check.user'])->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/submit', [ReviewController::class, 'submit'])->name('reviews.submit');
});

//Manger Reviews Management
Route::prefix('reviews')->middleware(['auth', 'check.manager'])->group(function () {
    Route::get('/list', [ReviewController::class, 'list'])->name('reviews.list');
    Route::get('/{id}/delete', [ReviewController::class, 'delete'])->name('reviews.delete');
});

//Authentication & Autorization
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage']);
    Route::get('/register', [AuthController::class, 'registerPage']);
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
