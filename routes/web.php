<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
// use App\Http\Controllers\Admin\Auth\LoginController;
// use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;

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

/*======================
  ADMIN ROUTES
========================*/
Route::group(['prefix' => 'admins', 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login')->name('login');

        Route::get('/forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/forgot-password', 'ForgotPasswordController@sendResetLinkEmail')->name('password.request');

        Route::get('/reset-password/{token}', 'ResetPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('/reset-password/{token}', 'ResetPasswordController@reset')->name('password.reset');
    });

    Route::group(['middleware' => ['admin']], function () {

        //Dashboard
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        })->name('index');

        Route::get('/dashboard', 'Dashboard\DashboardController@getDashboard')->name('dashboard');
        Route::get('/landlord/{id}', 'Dashboard\DashboardController@landlordDetails')->name('landlord-details');
            
                // Route::get('/pieces', [LandlordController::class, 'getPieces'])->name('pieces');
                // Route::post('/pieces', [LandlordController::class, 'postPieces'])->name('pieces');

        Route::resource('approuved-landlords', 'Landlord\LandlordController');
        Route::resource('pages', 'PageContentController');
        Route::resource('apartment_types', 'ApartmentTypes\ApartmentTypesController');
        Route::resource('piece_types', 'PieceTypes\PieceTypesController');
        Route::resource('testimonials', 'TestimonyController');
        Route::resource('news', 'NewsController');
        Route::resource('faqs', 'FaqsController');

        // super Administrators
        Route::group(['middleware' => ['auth:admin', 'admin.super']], function () {
        Route::resource('administrator', 'Administrator\AdminController');
        Route::post('administrator/roles/{id}', 'Administrator\AdminController@assignRoles')->name('admin.roles');
        });

        Route::resource('property', 'Property\PropertyController');
        Route::resource('apartments', 'Apartment\ApartmentController');
        Route::post('/apartments/storeImages', 'Apartment\ApartmentController@storeImages')->name('apartments.storeImages');
        Route::put('/change-cover-image', 'Apartment\ApartmentController@changeCoverImage')->name('changeCoverImage');
        Route::get('/apartments/showRapports/{id}', 'Apartment\ApartmentController@showRapports')->name('apartments.showRapports');
        Route::get('/apartments/showPayments/{id}', 'Apartment\ApartmentController@showPayments')->name('apartments.showPayments');
        Route::resource('pieces', 'Pieces\PiecesController');
        Route::delete('/pieces/destroyImage/{id}', 'Pieces\PiecesController@destroyImage')->name('pieces.destroyImage');
        Route::resource('rapports', 'Rapport\RapportController');
        Route::resource('payments', 'Payments\PaymentsController');

        // APPROUVE LANDLORD ACCOUNT
        Route::post('users/{user}/approve', 'Administrator\AdminController@approve')->name('users.approve');
        // REJECT LANDLORD ACCOUNT
        Route::delete('users/{user}/reject', 'Administrator\AdminController@reject')->name('users.reject');

        // PROFILE
        Route::get('/profile', 'Profile\ProfileController@getProfile')->name('profile');
        Route::post('/profile/edit', 'Profile\ProfileController@editProfile')->name('profile.edit');
        Route::post('/profile/change-password', 'Profile\ProfileController@changePassword')->name('profile.password');

        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    });

});

// Route::group(['namespace' => 'Landlord', 'prefix' => 'landlord', 'as' => 'landlord.'], function () {
//     Route::group(['middleware' => ['auth:landlord']], function () {
//     });


//     // check
//     Route::get('/profile', [LandlordController::class, 'profile'])->name('profile');
//     Route::put('/profile', [LandlordController::class, 'updateProfile'])->name('profile');
//     Route::get('/create', [LandlordController::class, 'create'])->name('create');
//     Route::post('/store', [LandlordController::class, 'store'])->name('store');
//     Route::get('/{id}/edit', [LandlordController::class, 'edit'])->name('edit');
//     Route::put('/{id}/update', [LandlordController::class, 'update'])->name('update');
//     Route::delete('/{id}/destroy', [LandlordController::class, 'destroy'])->name('destroy');
//     Route::put('/change_password', [LandlordController::class, 'postChangePassword'])->name('change_password');
//     // check
//     Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// });


//Web routes
Route::group(['namespace' => 'web'], function () {
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/register', 'Auth\RegisterController@store')->name('register');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
       
    Route::group(['middleware' => ['auth']], function () {
    });
    Route::get('/', 'PageController@index')->name('index');
    Route::get('/search-appartment', 'PageController@searchForm')->name('search-appartment');
    Route::get('/apartments/single-appartment/{id}', 'PageController@show')->name('single-appartment');
    Route::get('/single-appartment/{id}', 'PageController@showSingleAppartment')->name('single-appartment');
    Route::post('/apartments/filter', 'ApartmentController@filterApartments')->name('apartments.filter');
    Route::get('/apartments/count', 'ApartmentController@countApartments')->name('apartments.count');
    Route::get('/help', 'PageController@help')->name('help');
    Route::get('/proprietaires', 'PageController@proprietaire')->name('proprietaires.index');
});


Route::get('/prop', function () {
    return view('aide');
});

Route::get('/prop', function () {
    return view('landlord.create_property');
});

Route::get('/proprietaires', function () {
    return view('proprietaires.index');
});


