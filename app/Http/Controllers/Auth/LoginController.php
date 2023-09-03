<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'landlord';

    protected $redirectTo = RouteServiceProvider::LANDLORD;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (Auth('landlord')->check()) {
            return redirect()->route('landlord.index');
        }

        return view('auth.login'); // Update this to match your view location
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        if (auth()->guard('landlord')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->intended($this->redirectPath());
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth('landlord')->logout();
        return redirect()->route('login'); // Update the route name as needed
    }
}
