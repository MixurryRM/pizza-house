<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    //show all pizzas
    public function index(){
        $name = request('name');
        $price = request('price');

        $pizzas = [
            'name' => $name,
            'type' => 'Chill Taste',
            'price' => $price
        ];
        return view('pizzas',compact('pizzas'));
    }

    //show single pizza
    public function show($id){
        return view('details',compact('id'));
    }
}
