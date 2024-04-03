<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::whereIn('role',['user','staff'])->filter(request(['search']))->paginate(4);
        return view('users.index',compact('users'));
    }

    public function changeRole(Request $request){
        $updateRole = [
            'role' => $request->role
        ];
        User::where('id',$request->userId)->update($updateRole);
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
