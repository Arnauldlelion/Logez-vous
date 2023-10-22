<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\User;
use App\Models\Locataire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    function getDashboard()
    {
        $landlords = User::orderBy('created_at', 'DESC')->where('is_approved', false)->paginate(20);
        // $candidatures = Locataire::orderBy('created_at', 'ASC')->where('is_approved', false)->get();
        // Get the IDs of properties associated with the admin
    $adminPropertyIds = auth('admin')->user()->properties()->pluck('id')->toArray();

    $candidatures = Locataire::where('is_approved', false)
        ->whereHas('apartment', function ($query) use ($adminPropertyIds) {
            $query->whereIn('property_id', $adminPropertyIds);
        })
        ->get();

        return view('admin.dashboard.index', compact('landlords', 'candidatures'));
    }
    
    public function unApprovedLocataires()
    {
        $landlords = User::orderBy('created_at', 'DESC')->where('is_approved', false)->paginate(20);

        if (auth()->check()) {
            // Get the IDs of properties associated with the admin
            $adminPropertyIds = auth()->user()->properties()->pluck('id')->toArray();

            $candidatures = Locataire::where('is_approved', false)
                ->whereHas('apartment', function ($query) use ($adminPropertyIds) {
                    $query->whereIn('property_id', $adminPropertyIds);
                })
                ->get();
        } else {
            $candidatures = collect(); // Create an empty collection if user is not authenticated
        }

        return view('admin.dashboard.index', compact('landlords', 'candidatures'));
    }

    public function landlordDetails($id)
    {
        $landlord = User::findOrFail($id);
        return view('admin.un-approved-landlord.show',
            compact('landlord'));
            
    }

}
