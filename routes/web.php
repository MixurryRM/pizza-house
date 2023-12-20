<?php

use App\Http\Controllers\PizzaController;
use App\Models\Pizzas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//show all pizzas
Route::get('/pizzas',[PizzaController::class,'index']);

//show create form
ROute::get('/pizzas/create',[PizzaController::class,'create']);

//store pizza data
Route::post('/pizzas',[PizzaController::class,'store']);

//destory pizza data
Route::get('/pizzas/{id}/delete',[PizzaController::class,'delete']);

//show sigle pizza
Route::get('/pizzas/{id}',[PizzaController::class,'show']);


