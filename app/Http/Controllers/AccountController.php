<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Clockwork\Storage\Storage;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index');
    }

    public function editPage()
    {
        return view('accounts.editPage');
    }

    public function changePasswordPage()
    {
        return view('accounts.chnagePassword');
    }

    public function changePassword($id, Request $request)
    {
        $fileds = $request->validate([
            'oldPassword' => 'required|min:6|max:12',
            'newPassword' => 'required|min:6|max:12',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $user = User::select('password')->where('id', $id)->first();
        $dbHashPassword = $user->password;

        if (Hash::check($request->oldPassword, $dbHashPassword)) {

            $data = ['password' => Hash::make($request->newPassword)];

            User::where('id', $id)->update($data);

            return back()->with(['message' => 'Password Change Success...']);
        }

        return back()->with(['notMatch' => 'The old password not match.Try again!']);
    }

    public function update(Request $request, $id)
    {
        $fileds = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'image' => 'image|mimes:png,jpg,webp,jpeg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $userData = User::find($id);
            $dbImage = $userData->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('public', $fileName);

            $fileds['image'] = $fileName;
        }

        User::where('id', $id)->update($fileds);
        return back()->with('message', 'Profile Uploaded ...');
    }
}
