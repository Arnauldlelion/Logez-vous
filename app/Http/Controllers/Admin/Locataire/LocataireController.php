<?php

namespace App\Http\Controllers\Admin\Locataire;

use App\Models\Locataire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        if ($request->get('q')) {
            $search['q'] = $request->get('q');
            $tenants = $tenants->where('name', 'like', '%' . $search['q'] . '%');
        }

        if ($request->get('limit')) {
            $search['limit'] = $request->get('limit');
        }
        $tenants = $tenants->where('is_approved', true)->paginate($search['limit']);

    
        return view('admin.tenants.index' , compact('tenants', 'search'));
    }

    public function unApprovedCandidature()
    {
        $candidatures = Locataire::orderBy('created_at', 'ASC')
            ->where('is_approved', false)
            ->paginate(20); // Adjust the pagination limit as per your requirement
        
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
    
        // Additional logic if needed
    
        return redirect()->back()->with('success', 'Candidature rejetée et supprimée.');
    }
}
