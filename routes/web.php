<?php


use App\Http\Controllers\AppartementsController;
use App\Http\Controllers\AideController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\locatairesPanelController;
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
    Route::get('/appartements/{name}', 'singleAppartment')->name('single-appartment');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/user/premiere-connexion', 'landlordInfo')->name('landlord-info');
});


Route::get('/appartements', [AppartementsController::class, 'appartements'])->name('appartements');


Route::get('/aide', [AideController::class, 'aide'])->name('aide');

/*routes for locataires panel*/


Route::get('/layouts/locatairespanel', [locatairesPanelController::class, 'locatairespanel'])->name('locataires');

Route::get('/help', function () {
    return view('help');
});
Route::get('/candidate', function () {
    return view('components.candidate');
});

Route::get('/landloard', function () {
    return view('components.landlord');
});

Route::get('/nos-partenaires', function () {
    return view('components.nos-partenaires');
});

Route::get('/mon-compte', function () {
    return view('components.mon-compte');
});

Route::get('/dossier', function () {
    return view('components.dossier-locatif');
});

/*routes for proprietaires panel*/

Route::get('/layouts/panel', [PanelController::class, 'panel'])->name('panel');

Route::get('/confirmaton', function () {
    return view('components.confirmation');
}); 

