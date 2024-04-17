<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pizzas;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['user', 'staff'])->filter(request(['search']))->get();
        return view('users.index', compact('users'));
    }

    public function pizzaIndex()
    {
        $usersWithOrders = User::orderBy('id', 'desc')->whereHas('pizzas', function ($query) {
            $query->where('user_id', '>', 0);
        })->paginate(5);

        return view('users.pizzaIndex', compact('usersWithOrders'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return back();
    }

    public function changeRole(Request $request)
    {
        $updateRole = [
            'role' => $request->role
        ];
        User::where('id', $request->userId)->update($updateRole);
    }

    // public function switchRole(Request $request){
    //     if ($request->role == 'user') {
    //         $data = User::where('role','user')->get();
    //     } else {
    //         $data = User::where('role','staff')->get();
    //     }
    //     return $data;
    // }
}
