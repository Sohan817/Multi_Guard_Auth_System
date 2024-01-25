<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function create(Request $request)
    {
        //Validate input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return redirect()->back()->with("Success", "You have successfully registered");
        } else {
            return redirect()->back()->with("Failed", "Something went wrong,failed to registered");
        }
    }
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30',
        ], ['email.exists' => "This email is not exists in user table"]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with("Fail", "Incorrect Credencials");
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
