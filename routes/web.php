<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Landlord\LandlordController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;

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


// My routes 
Route::group(['namespace' => 'Admin', 'prefix' => 'admins', 'as' => 'admins.'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    });

    Route::group(['middleware' => ['auth:admins']], function () {
        Route::get('/', function () {
            return redirect()->route('admins.dashboard');
        });

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('pages', 'PageContentController');
        Route::resource('apartment_types', 'ApartmentTypesController');
        Route::resource('piece_types', 'PiecesTypeController');
        Route::resource('testimonials', 'TestimonyController');
        Route::resource('news', 'NewsController');
        Route::resource('faqs', 'FaqsController');

        Route::get('/profile', 'DashboardController@profile')->name('profile');
        Route::put('/profile/edit', 'DashboardController@editProfile')->name('profile.edit');
        Route::put('/profile/change-password', 'DashboardController@changePassword')->name('profile.change_password');

        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});

// Auth::routes();
Route::group(['namespace' =>'Auth'], function() {
    Route::post('/register', 'RegisterController@createBizUser')->name('register');
    Route::post('/login', 'LoginController@login')->name('login.submit');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});
Route::group(['namespace' => 'Landlord', 'prefix' => 'landlord', 'as' => 'landlord.'], function () {
    Route::group(['middleware' => ['auth:landlord']], function () {
        Route::get('/', [LandlordController::class, 'index'])->name('index');
        Route::get('/dashboard', [LandlordController::class, 'dashboard'])->name('dashboard');
        Route::get('/tenants', [LandlordController::class, 'tenants'])->name('tenants');
        // Route::get('/pieces', [LandlordController::class, 'getPieces'])->name('pieces');
        // Route::post('/pieces', [LandlordController::class, 'postPieces'])->name('pieces');
        Route::resource('property', 'PropertyController');
        Route::resource('apartments', 'ApartmentController');
        Route::post('/apartments/storeImages', 'ApartmentController@storeImages')->name('apartments.storeImages');
        Route::post('/change-cover-image', 'AppartmentController@changeCoverImage')->name('changeCoverImage');
        Route::get('/apartments/showRapports/{id}', 'ApartmentController@showRapports')->name('apartments.showRapports');
        Route::get('/apartments/showPayments/{id}', 'ApartmentController@showPayments')->name('apartments.showPayments');
        Route::resource('pieces', 'PiecesController');
        Route::delete('/pieces/destroyImage/{id}', 'PiecesController@destroyImage')->name('pieces.destroyImage');
        Route::resource('rapports', 'RapportController');
        Route::resource('payments', 'PaymentsController');
        Route::get('/profile', [LandlordController::class, 'profile'])->name('profile');
        Route::put('/profile', [LandlordController::class, 'updateProfile'])->name('profile');
        Route::get('/create', [LandlordController::class, 'create'])->name('create');
        Route::post('/store', [LandlordController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [LandlordController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [LandlordController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [LandlordController::class, 'destroy'])->name('destroy');
        Route::put('/change_password', [LandlordController::class, 'postChangePassword'])->name('change_password');
    });
});




//Web routes
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/search-appartment', 'HomeController@searchForm')->name('search-appartment');
    Route::get('/apartments/single-appartment/{id}', 'HomeController@show')->name('single-appartment');
    Route::get('/single-appartment/{id}', 'HomeController@showSingleAppartment')->name('single-appartment');
    Route::get('/help', 'HomeController@help')->name('help');
});


Route::get('/prop', function () {
    return view('aide');
});

Route::get('/prop', function () {
    return view('landlord.create_property');
});

Route::get('/filter', 'App\Http\Controllers\FilterController@filterResults');




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
