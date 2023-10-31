<?php

namespace App\Http\Controllers\web\Locataire;

use App\Models\Property;
use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewTenantRequest;
use Illuminate\Support\Facades\Mail;

class LocataireController extends Controller
{
    public function locataire()
    {
        $landlordId = Auth::id(); // Get the authenticated landlord's ID
        
        $propertyIds = Property::where('landlord_id', $landlordId)->pluck('id');
    
        $approvedTenants = Locataire::where('is_approved', true)
            ->whereIn('apartment_id', $propertyIds)
            ->get();
        
        return view('landlord.tenants.index', compact('approvedTenants'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:locataires', 'regex:/^\d{9}$/'],
            'email' => ['required', 'string', 'email', 'unique:locataires', 'max:255'],
            'apartment_id' => ['required', 'exists:apartments,id'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $tenant = Locataire::create($input);

        $adminEmail = 'arnauldfohom1@gmail.com'; 
        
        // Send the email to the admin
        Mail::to($adminEmail)->send(new NewTenantRequest($input));

        Alert::success('Bravo!', 'Nous avons bien reçu vos informations, un agent vous recontactera.');
        return redirect()->back();
    }
}