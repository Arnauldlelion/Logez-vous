<?php

namespace App\Http\Controllers\web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
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

        $apartments = Apartment::inRandomOrder()
            ->filter()
            ->latest()
            ->with('images')
            ->take(8)
            ->get();

        return view('index', ['login' => true, 'apartments' => $apartments]);
    }

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
