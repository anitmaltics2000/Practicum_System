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
        return view('role-selection');
    }

    public function showStudentRegister()
    {
        return view('register-student');
    }

    public function showCompanyRegister()
    {
        return view('register-company');
    }

    public function showAdminRegister()
    {
        return view('register-admin');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:student,company,admin',
            'admission_number' => 'required_if:role,student|string|max:255|unique:users',
            'company_name' => 'required_if:role,company|string|max:255',
            'company_email' => 'required_if:role,company|email|max:255',
            'company_phone' => 'required_if:role,company|string|max:20',
            'company_address' => 'required_if:role,company|string|max:500',
            'company_industry' => 'required_if:role,company|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'admission_number' => $request->role === 'student' ? $request->admission_number : null,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->role === 'company') {
            $user->company()->create([
                'company_name' => $request->company_name,
                'email' => $request->company_email,
                'phone' => $request->company_phone,
                'address' => $request->company_address,
                'industry' => $request->company_industry,
            ]);
        }

        Auth::login($user);

        $roleMessage = match($request->role) {
            'company' => 'Company Representative',
            'admin' => 'Administrator',
            default => 'Student'
        };
        return redirect('/profile')->with('success', "Account created successfully! Welcome, {$user->name} ({$roleMessage})");
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginField = filter_var($request->login_identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'admission_number';

        $credentials = [
            $loginField => $request->login_identifier,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $roleMessage = match($user->role) {
                'company' => 'Company Representative',
                'admin' => 'Administrator',
                default => 'Student'
            };
            return redirect('/profile')->with('success', "Welcome back, {$user->name} ({$roleMessage})! You have successfully signed in.");
        }

        return back()->withErrors([
            'login_identifier' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('login_identifier'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
