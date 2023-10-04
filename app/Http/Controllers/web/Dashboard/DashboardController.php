<?php

namespace App\Http\Controllers\web\Dashboard;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function getDashboard()
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
    
        return view('landlord.dashboard.index', compact('properties', 'totalApartments', 'userName', 'totalRapportDeGestionsCount'));
    }

   public function properties(){
         // Get the authenticated landlord
         $landlord = Auth::guard('landlord')->user();
    
         // Retrieve properties and apartments
         $properties = $landlord->properties;

         return view('landlord.properties.index', compact('properties'));
   }

   public function apartments()
   {
       // Get the authenticated landlord
       $landlord = Auth::guard('landlord')->user();
       
       // Retrieve properties with their apartments
       $properties = $landlord->properties()->with('apartments')->get();
   
       return view('landlord.apartments.index', compact('properties'));
   }

    public function showApartments($propertyId) {
        // Retrieve the property with its apartments
        $property = Property::with('apartments')->findOrFail($propertyId);

        return view('landlord.apartments.show', compact('property'));
    }

        public function rapportDeGestion()
        {
            // Get the authenticated landlord
            $landlord = Auth::guard('landlord')->user();

            // Retrieve properties and apartments belonging to the landlord
            $properties = $landlord->properties;

            $rapportDeGestions = collect();
            foreach ($properties as $property) {
                $rapportDeGestions = $rapportDeGestions->merge($property->apartments->pluck('rapportDeGestions')->flatten());
            }

            return view('landlord.rapport_de_gestion.index', compact('rapportDeGestions'));
        }

        public function generalRapportDeGestion()
        {
            // Get the authenticated landlord
            $landlord = Auth::guard('landlord')->user();

            // Retrieve properties and apartments belonging to the landlord
            $properties = $landlord->properties;

            $AnnualRapportDeGestions = collect();
            foreach ($properties as $property) {
                $AnnualRapportDeGestions = $AnnualRapportDeGestions->merge($property->apartments->pluck('AnnualRapportDeGestions')->flatten());
            }

            return view('landlord.annual-rapport-de-gestion.index', compact('AnnualRapportDeGestions'));
        }
}
