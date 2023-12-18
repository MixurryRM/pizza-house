<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pizzas = [
        'name' => 'Pizzas',
        'type' => 'Chill Taste',
        'price' => 100
    ];
    return view('pizzas',compact('pizzas'));
});
