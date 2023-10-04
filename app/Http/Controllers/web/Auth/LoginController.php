<?php

namespace App\Http\Controllers\web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('landlord')->attempt($credentials)) {
            // Authentication passed, redirect to the intended page
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid credentials or user not approved.']);
        }
    }
    
    public function logout(Request $request)
    {
        Auth::guard('landlord')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
