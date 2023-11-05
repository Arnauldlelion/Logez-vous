<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SendMailController;
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
        Route::get('landlords/create/{id}', 'Landlord\LandlordController@create')->name('landlord.create');
        Route::resource('landlords', 'Landlord\LandlordController');
        Route::resource('apartment_types', 'ApartmentTypes\ApartmentTypesController');
        Route::resource('approuved-landlords', 'Landlord\LandlordController');
        Route::resource('piece_types', 'PieceTypes\PieceTypesController');
        Route::resource('amenities', 'Amenity\AmenityController');
        // Route::resource('pages', 'PageContentController');
        // Route::resource('news', 'NewsController');
        Route::resource('faqs', 'FaqsController');



        // super Administrators
        Route::group(['middleware' => ['auth:admin', 'admin.super']], function () {
            Route::resource('administrator', 'Administrator\AdminController');
            Route::post('/landlords/update-admin/{landlord}', 'Administrator\AdminController@updateAdmin')->name('landlords.updateAdmin');
            Route::post('administrator/reassign-landlord/{landlord}', 'Administrator\AdminController@reassignLandlord')->name('reassign-landlord');
            Route::post('administrator/roles/{id}', 'Administrator\AdminController@assignRoles')->name('admin.roles');
        });

        Route::resource('property', 'Property\PropertyController');
        Route::delete('/admin/property/{property}/amenity/{amenity}', 'Property\PropertyController@removeAmenity')->name('property.removeAmenity');
        Route::get('/property/{propertyId}/images', 'Property\PropertyController@showPropertyImagesform')->name('showPropertyImagesform');
        Route::post('/property/{propertyId}/images', 'Property\PropertyController@storePropertyImages')->name('property-images');
        Route::delete('/property/image/{id}', 'Property\PropertyController@deletePropertyImage')->name('deletePropertyImage');

        Route::resource('apartments', 'Apartment\ApartmentController');
        Route::get('/apartment/{id}/images', 'Apartment\ApartmentController@showApartmentImagesform')->name('showApartmentImagesform');
        Route::post('/apartment/{id}/images', 'Apartment\ApartmentController@storeApartmentImages')->name('apartment-images');
        Route::delete('/apartment/destroyImage/{id}', 'Apartment\ApartmentController@deleteApartmentImage')->name('delete-apartment-image');
        Route::put('/apartment/change-cover', 'Apartment\ApartmentController@changeCoverImage')->name('changeCoverImage');

        Route::post('/apartments/storeImages', 'Apartment\ApartmentController@storeImages')->name('apartments.storeImages');
        Route::get('/apartments/showPayments/{id}', 'Apartment\ApartmentController@showPayments')->name('apartments.showPayments');
        Route::resource('pieces', 'Pieces\PiecesController');
        Route::get('/piece/{id}/images', 'Pieces\PiecesController@showPieceImagesform')->name('showPieceImagesform');
        Route::post('/piece/{id}/images', 'Pieces\PiecesController@storePieceImages')->name('piece-images');
        Route::delete('/piece/destroyImage/{id}', 'Pieces\PiecesController@deletePieceImage')->name('piece.destroyImage');
        Route::get('/rapport/{id}/index', 'Rapport\RapportController@index')->name('rapportIndex');
        Route::post('/upload/pdf/{id}', 'Rapport\RapportController@store')->name('upload.pdf');
        Route::resource('rapports', 'Rapport\RapportController');
        // General Rapport
        Route::get('/rapport-general/{id}/index', 'GeneralRapport\GeneralRapportController@index')->name('generalrapportIndex');
        Route::post('/upload/general-rapport/{id}', 'GeneralRapport\GeneralRapportController@store')->name('general-rapport.upload');
        Route::resource('rapport-general', 'GeneralRapport\GeneralRapportController');


        // REJECT LANDLORD ACCOUNT
        Route::delete('users/{user}/reject', 'Administrator\AdminController@reject')->name('users.reject');

        // TENANTS
        Route::resource('tenants', 'Locataire\LocataireController');
        Route::get('candidatures/non-approved', 'Candidature\CandidatureController@index')->name('candidature.index');
        Route::post('candidatures/approve/{candidate}', 'Candidature\CandidatureController@approveCandidature')->name('candidatures.approve');
        Route::delete('candidatures/reject/{id}', 'Candidature\CandidatureController@rejectCandidature')->name('candidatures.reject');

        // PROFILE
        Route::get('/profile', 'Profile\ProfileController@getProfile')->name('profile');
        Route::post('/profile/edit', 'Profile\ProfileController@editProfile')->name('profile.edit');
        Route::post('/profile/change-password', 'Profile\ProfileController@changePassword')->name('profile.password');

        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});

// Landlord routes
Route::group(['namespace' => 'Landlord',  'middleware' => ['auth:landlord']], function () {
    // Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    // Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/dashboard', 'Dashboard\DashboardController@getDashboard')->name('landlord.dashboard');
    Route::get('/mes-logement', 'Dashboard\DashboardController@properties')->name('properties');
    Route::get('/appartements', 'Dashboard\DashboardController@apartments')->name('apartments');
    Route::get('/rapport-de-gestion', 'Dashboard\DashboardController@rapportDeGestion')->name('rapport-de-gestion');
    Route::get('/rapport-de-gestion-general', 'Dashboard\DashboardController@generalRapportDeGestion')->name('annual-rapport-de-gestion');
    Route::get('locataire', 'Dashboard\DashboardController@locataire')->name('tenants');
    Route::get('/profile', 'Profile\ProfileController@getProfile')->name('profile');
    Route::post('/profile/edit', 'Profile\ProfileController@editProfile')->name('profile.edit');
    Route::post('/profile/change-password', 'Profile\ProfileController@changePassword')->name('profile.password');
    Route::get('appartments/{propertyId}', 'Dashboard\DashboardController@showApartments')->name('apartments.show');
    Route::get('/apartments/{apartmentId}/rapport-de-gestions', 'Dashboard\DashboardController@showRapportDeGestions')->name('apartments.rapport-de-gestions');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    // Route::get('/proprietaires', [PageController::class, 'proprietaire'])->name('proprietaires.index');
});


//Web routes
Route::group(['namespace' => 'web'], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/register', 'Auth\RegisterController@store')->name('register');
    // Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/gestion', 'Auth\RegisterController@showRegistrationForm')->name('gestion');
    Route::post('/register', 'Auth\RegisterController@store')->name('register');
    Route::post('/locataire/apartment', 'Locataire\LocataireController@store')->name('storeLocataire');

    Route::get('/', 'PageController@index')->name('index');
    Route::get('/search-appartment', 'PageController@searchForm')->name('search-appartment');
    Route::post('/search-appartment', 'PageController@searchForm')->name('search-appartment');
    Route::get('/single-appartment/{id}', 'PageController@showSingleAppartment')->name('single-appartment');
    Route::get('/help', 'PageController@help')->name('help');

    Route::get('/info', 'PageController@info')->name('info');
});
