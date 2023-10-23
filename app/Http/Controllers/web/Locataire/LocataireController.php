<?php

namespace App\Http\Controllers\web\Locataire;

use App\Models\Property;
use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LocataireController extends Controller
{

    public function locataire(){
        $propertyIds = Property::where('landlord_id', $landlordId)->pluck('id');
    
    $approvedTenants = Locataire::where('is_approved', true)
        ->whereIn('apartment_id', $propertyIds)
        ->get();
        
        return view('landlord.tenants.index', compact( 'approvedTenants'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => ['required', 'unique:locataires', 'regex:/^\d{9}$/'],
            'email' => 'required|email|unique:locataires|max:255',
            'apartment_id' => 'required|exists:apartments,id',
        ]);

        $Locataire = Locataire::create($validatedData);

        Alert::success('success', 'thanks');
        return redirect()->back();
    }
}
