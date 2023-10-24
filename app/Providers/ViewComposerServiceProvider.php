<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Models\Locataire;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('admin.layouts.header', function (View $view) {
        // Get the IDs of properties associated with the admin
        $adminPropertyIds = auth('admin')->user()->properties()->pluck('id')->toArray();

        $candidatures = Locataire::where('is_approved', false)
        ->whereHas('apartment', function ($query) use ($adminPropertyIds) {
            $query->whereIn('property_id', $adminPropertyIds);
        })
        ->get();
        
            $view->with('candidatures', $candidatures);
        });
    }
}
