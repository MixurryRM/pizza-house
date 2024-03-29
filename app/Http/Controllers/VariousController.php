<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\Type;
use App\Models\Crust;
use App\Models\Topping;
use Illuminate\Http\Request;

class VariousController extends Controller
{
    //show create order form
    public function createPage(){
        return view('pizzas.create');
    }

    public function type(Request $request){
        $type = [
            'name' => $request->type,
        ];
        Type::create($type);
        return back();
    }

    public function topping(Request $request){
        $topping = [
            'name' => $request->topping,
        ];
        Topping::create($topping);
        return back();
    }

    public function base(Request $request){
        $base = [
            'name' => $request->base,
        ];
        Base::create($base);
        return back();
    }

}
