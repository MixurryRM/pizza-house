<?php

namespace App\Http\Controllers;

use App\Models\Pizzas;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    //show all pizzas
    public function index(){
        $name = request('name');
        $price = request('price');

        $pizzas = Pizzas::orderBy('id','desc')->get();
        return view('pizzas',compact('pizzas'));
    }

    //show single pizza
    public function show($id){
        return view('details',compact('id'));
    }
}
