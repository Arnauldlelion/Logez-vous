<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Email verification routes during registration
Route::controller(EmailController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/email/verify', 'verify')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'verifyEmail')
            ->middleware('signed')
            ->name('verification.verify');
        Route::post('/email/verification-notification', 'resendEmail')
            ->middleware(['throttle:6,1'])->name('verification.resend');
    });

Auth::routes();

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
});



Route::get('/candidate', function () {
    return view('components.candidate');
});