<?php

namespace App\Http\Controllers\Landlord\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    //

    public function showLoginForm()
    {

        if (Auth('landlord')->check()) {
            return redirect()->route('landlord.dashboard');
        }

        return view('web.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('landlord')->attempt($credentials)) {
            // Authentication passed, redirect to the intended page
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Informations non valide ou utilisateur non approuver.']);
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

