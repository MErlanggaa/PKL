<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check user role and redirect accordingly
            if ($user->role === 'hilmi') {
                return redirect()->route('dashboard.hilmi');
            } elseif ($user->role === 'erlangga') {
                return redirect()->route('dashboard.erlangga');
            } else {
                return redirect()->route('home'); // Default redirect if role not defined
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
