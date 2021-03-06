<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/');
        }

        return back();
    }

    public function login()
    {
        return view('pages.auth.login');
    }
    
    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/login');
    }

}
