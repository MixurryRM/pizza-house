<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role','user')->paginate(5);
        return view('users.index',compact('users'));
    }

    public function changeRole(Request $request){
        $updateRole = [
            'role' => $request->role
        ];
        User::where('id',$request->userId)->update($updateRole);
    }
}
