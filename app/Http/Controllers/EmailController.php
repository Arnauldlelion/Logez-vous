<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EmailController extends Controller
{
    public function verify()
    {
        return view('auth.verify');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        $request->cookie('laravel_session', null);
        $request->cookie('XSRF-TOKEN', null);
        return redirect('/login');
    }

    public function resendEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Lien de vérification envoyé!');
    }
}
