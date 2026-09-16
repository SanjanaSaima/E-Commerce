<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.login')->with('success', 'Registration successful. Please login.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]); 

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/index')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    
    }
}
