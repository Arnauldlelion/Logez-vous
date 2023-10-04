<?php

namespace App\Http\Controllers\web\Locataire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locataire;
use Illuminate\Validation\Rule;

class LocataireController extends Controller
{
    public function store(Request $request, $apartment_id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
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
