<?php

namespace App\Http\Controllers\Admin\Locataire;

use App\Models\Locataire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class LocataireController extends Controller
{
    //
    protected $search = [
        'q' => null,
        'limit' => 20
    ];
    
    public function tenants(Request $request)
    {
        $search = $this->search;
        $tenants = new Locataire();
    
        $adminPropertyIds = auth('admin')->user()->properties()->pluck('id')->toArray();
    
        $tenants = $tenants->where('is_approved', true)
            ->whereHas('apartment', function ($query) use ($adminPropertyIds) {
                $query->whereIn('property_id', $adminPropertyIds);
            });
    
        if ($request->has('q')) {
            $search['q'] = $request->get('q');
            $tenants = $tenants->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search['q'] . '%')
                    ->orWhere('last_name', 'like', '%' . $search['q'] . '%');
            });
        }
    
        if ($request->has('limit')) {
            $search['limit'] = $request->get('limit');
        }
    
        $tenants = $tenants->paginate($search['limit']);
    
        return view('admin.tenants.index', compact('tenants', 'search'));
    }


    public function unApprovedCandidature()
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
     
    
        return view('admin.candidature.index', compact('candidatures'));
    }

    public function approveCandidature(Locataire $candidate)
    {
        
        $candidate->is_approved = true;
        $candidate->save();
    
        // return redirect()->back()->with('success', 'Candidature approuvée.');
        return redirect()->back()->with('success', 'Candidature approuvée.')->with('candidate', $candidate);
    }

    public function rejectCandidature($id)
    {
        $candidature = Locataire::findOrFail($id);
        $candidature->delete();
    
        return redirect()->back()->with('success', 'Candidature rejetée et supprimée.');
    }
}
