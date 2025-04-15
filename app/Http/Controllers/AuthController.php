<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if (!$user) {
            return redirect()->back()->with('error', 'Something went wrong');
        } else {
            return redirect()->route('login')->with('success', 'You have been registered successfully');
        }
    }

    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }


    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);


        $user = User::where('email', $request->email)->first();


        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'رمز عبور وارد شده صحیح نیست']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }
    public function logout(Request $request){

        $userName = auth()->user()->name;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

}
