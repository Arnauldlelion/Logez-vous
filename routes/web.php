<?php


use App\Http\Controllers\Landlord\ApartmentController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\AideController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\Landlord\LandlordController;
use App\Http\Controllers\Landlord\PropertyController;
use App\Http\Controllers\locatairesPanelController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/appartements/{name}', 'singleAppartment')->name('single-appartment');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/user/premiere-connexion', 'landlordInfo')->name('landlord-info');
});

// My routes 
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admins', 'as' => 'admins.'], function () {
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
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index')->name('register-view');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@createBizUser')->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['namespace' => 'App\Http\Controllers\Landlord', 'prefix' => 'landlord', 'as' => 'landlord.'], function () {
    Route::group(['middleware' => ['auth:landlord']], function () {
        Route::get('/', [LandlordController::class, 'index'])->name('index');
        Route::get('/tenants', [LandlordController::class, 'tenants'])->name('tenants');
        // Route::get('/pieces', [LandlordController::class, 'getPieces'])->name('pieces');
        // Route::post('/pieces', [LandlordController::class, 'postPieces'])->name('pieces');
        Route::resource('property', 'PropertyController');
        Route::resource('apartments', 'ApartmentController');
        Route::post('/apartments/storeImages', 'ApartmentController@storeImages')->name('apartments.storeImages');
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

// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function() {

// Route::group(['namespace' => 'App\Http\Controllers\Admin\Auth'], function () {

// });

// My routes 

Route::get('/properties', [PropertiesController::class, 'properties'])->name('properties');

// Route to display the create property form
Route::get('/properties/create', [PropertiesController::class, 'create'])->name('create-property');

// Route to handle property creation
Route::post('/properties', [PropertiesController::class, 'store'])->name('properties.store');
Route::get('/properties/recent', [PropertiesController::class, 'recent'])->name('properties.recent');

// Route::get('/aide', [AideController::class, 'aide'])->name('aide');

/*routes for locataires panel*/


// Route::get('/layouts/locatairespanel', [locatairesPanelController::class, 'locatairespanel'])->name('locataires');

// Route::get('/help', function () {
//     return view('help');
// });
// Route::get('/candidate', function () {
//     return view('components.candidate');
// });

// Route::get('/landloard', function () {
//     return view('components.landlord');
// });

// Route::get('/nos-partenaires', function () {
//     return view('components.nos-partenaires');
// });

// Route::get('/mon-compte', function () {
//     return view('components.mon-compte');
// });

// Route::get('/dossier', function () {
//     return view('components.dossier-locatif');
// });

// /*routes for proprietaires panel*/

// Route::get('/layouts/panel', [PanelController::class, 'panel'])->name('panel');

// Route::get('/confirmaton', function () {
//     return view('components.confirmation');
// });


Route::get('/prop', function () {
    return view('landlord.create_property');
});

Route::get('/filter', 'App\Http\Controllers\FilterController@filterResults');




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');