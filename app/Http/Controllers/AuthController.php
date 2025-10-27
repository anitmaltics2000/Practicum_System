<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showSignin()
    {
        return view('signin');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'admission_number' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'admission_number' => $request->admission_number,
            'password' => Hash::make($request->password),
            'role' => 'student', // Default role
        ]);

        Auth::login($user);

        return redirect('/profile')->with('success', 'Account created successfully! Welcome, ' . $user->name);
    }

    public function login(Request $request)
    {
        $request->validate([
            'admission_number' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'admission_number' => $request->admission_number,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return redirect('/profile')->with('success', 'Welcome back, ' . $user->name . '! You have successfully signed in.');
        }

        return back()->withErrors([
            'admission_number' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('admission_number'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
