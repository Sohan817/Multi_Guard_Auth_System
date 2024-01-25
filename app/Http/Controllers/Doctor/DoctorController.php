<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hospital' => 'required',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->hospital = $request->hospital;
        $doctor->email = $request->email;
        $doctor->password = Hash::make($request->password);
        $save = $doctor->save();

        if ($save) {
            return redirect()->back()->with("Success", "You have successfully registered as doctor");
        } else {
            return redirect()->back()->with("Failed", "Something went wrong,failed to registered");
        }
    }
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:doctors,email',
            'password' => 'required|min:5|max:30',
        ], ['email.exists' => "This email is not exists in user table"]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('doctor')->attempt($creds)) {
            return redirect()->route('doctor.home');
        } else {
            return redirect()->route('doctor.login')->with("Fail", "Incorrect Credencials");
        }
    }
    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/');
    }
}
