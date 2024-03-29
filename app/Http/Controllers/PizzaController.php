<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\Pizzas;
use App\Models\Topping;
use App\Models\Type;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    //show all pizzas
    public function index(){
        $name = request('name');
        $price = request('price');

        $pizzas = Pizzas::orderBy('id','desc')->get();
        return view('pizzas.index',compact('pizzas'));
    }

    //show single pizza
    public function show($id){
        $pizzas = Pizzas::where('id',$id)->first();
        if ($pizzas) {
            return view('pizzas.show',compact('pizzas'));
        } else {
             abort('404');
        };
    }

    //show order form
    public function order(){
        $types = Type::all();
        $bases = Base::all();
        $toppings = Topping::all();
        return view('pizzas.order',compact('types','bases','toppings'));
    }

    //store pizza data
    public function store(Request $request){
        $pizzas = [
            'name' => $request->name,
            'type' => $request->type,
            'base' => $request->base,
            'toppings' => $request->toppings
        ];
        Pizzas::create($pizzas);
        return redirect('/')->with(['message' => 'Thanks for your order']);
    }

    //destroying pizza data
    public function delete($id) {
        $pizzas = Pizzas::where('id',$id)->delete();
        return redirect('/pizzas')->with(['order' => 'Order complete ...']);
    }
}
