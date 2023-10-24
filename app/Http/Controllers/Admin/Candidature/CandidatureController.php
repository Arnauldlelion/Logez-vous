<?php

namespace App\Http\Controllers\Admin\Candidature;

use App\Models\Locataire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class CandidatureController extends Controller
{
    //
    public function index()
    {
        // Get the IDs of properties associated with the admin
        $adminPropertyIds = auth('admin')->user()->properties()->pluck('id')->toArray();
    
        $candidatures = Locataire::where('is_approved', false)
            ->whereHas('apartment', function ($query) use ($adminPropertyIds) {
                $query->whereIn('property_id', $adminPropertyIds);
            })
            ->paginate(10); // Set your desired number of items per page here
    
        // Use the Paginator::useBootstrap() method to apply Bootstrap styling to the pagination links
        Paginator::useBootstrap();
     
        $selectedCandidatureId = request()->query('selectedCandidatureId');
    
        return view('admin.candidature.index', compact('candidatures', 'selectedCandidatureId'));
    }

    public function approveCandidature(Locataire $candidate)
    {
        $candidate->is_approved = true;
        $candidate->save();

        // Update the corresponding apartment's published value
        $apartment = $candidate->apartment;
        $apartment->published = true;
        $apartment->save();

        return redirect()->back()->with('success', 'Candidature approuvée.')->with('candidate', $candidate);
    }

    public function rejectCandidature($id)
    {
        $candidature = Locataire::findOrFail($id);
        $candidature->delete();
    
        return redirect()->back()->with('success', 'Candidature rejetée et supprimée.');
    }

}
