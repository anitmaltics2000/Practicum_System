<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    // Future methods for login, register logic can be added here
}
