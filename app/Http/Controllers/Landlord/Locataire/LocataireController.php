<?php

namespace App\Http\Controllers\Landlord\Locataire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocataireController extends Controller
{
    //
    public function index($apartmentId)
    {
        $user = Auth::user();
        if ($user) {
            $landlordId = $user->landlord->id;
            $landlord = Landlord::find($landlordId);
            $locataires = $landlord->getLocatairesByApartmentId($apartmentId);
    
            return view('landlord.tenant.index', ['locataires' => $locataires, 'apartmentId' => $apartmentId]);
        }
    }
}
