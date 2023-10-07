<?php

namespace App\Http\Controllers\web\Locataire;

use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LocataireController extends Controller
{
    public function locataire()
    {
        // Get the authenticated landlord
        $landlord = Auth::guard('landlord')->user();
    
        $userName = $landlord->name;
    
        // Retrieve properties and apartments
        $properties = $landlord->properties;
    
        $totalApartments = $landlord->properties()
            ->with('apartments')
            ->get()
            ->pluck('apartments')
            ->flatten();
    
        // Retrieve all "rapport de gestion" and "annual rapport de gestion" records for the apartments
        $allRapportDeGestions = collect();
    
        foreach ($totalApartments as $apartment) {
            $allRapportDeGestions = $allRapportDeGestions->merge($apartment->rapportDeGestions);
            $allRapportDeGestions = $allRapportDeGestions->merge($apartment->annualRapportDeGestions);
        }
    
        $totalRapportDeGestionsCount = $allRapportDeGestions->count();
    
        // Retrieve approved tenant for each apartment
        $approvedTenants = collect();
    
        foreach ($totalApartments as $apartment) {
            if ($apartment->tenant && $apartment->tenant->is_approved) {
                $approvedTenants->push($apartment->tenant);
            }
        }
    
        return view('landlord.tenants.index', compact( 'approvedTenants'));
    }

    public function store(Request $request, $apartment_id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => ['required', 'unique:locataires', 'regex:/^\d{9}$/'],
            'email' => 'required|email|unique:locataires|max:255',
        ]);
    
        // Process other form fields and store data in the database
    
        $locataire = new Locataire;
        $locataire->first_name = $validatedData['first_name'];
        $locataire->last_name = $validatedData['last_name'];
        $locataire->phone = $validatedData['phone'];
        $locataire->email = $validatedData['email'];
        $locataire->is_approved = false;
        $locataire->apartment_id = $apartment_id; // Assign the apartment_id
        $locataire->save();
    
        // Rest of your code
    
        return redirect()->back()->with('success', 'Form submitted successfully.');
    }
}
