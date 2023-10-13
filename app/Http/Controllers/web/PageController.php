<?php

namespace App\Http\Controllers\web;

use App\Models\Apartment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //
    public function index()
    {
        $apartments = Apartment::orderBy('created_at', 'desc')
            ->with('images')
            ->take(8)
            ->get();
    
        return view('index', compact('apartments'));
    }

  
   public function searchForm(){
    $apartments = Apartment::with('images')->get();

    return view('web.apartments.index', compact('apartments'));
   }

    public function showSingleAppartment($id)
    {
        $apartment = Apartment::with(['images', 'pieces.images', 'property.amenities'])
            ->findOrFail($id);

        $otherApartments = Apartment::where('id', '!=', $apartment->id)
            ->with('images')
            ->get();

        // Retrieve the images belonging to both the apartment and piece
        $images = $apartment->images->merge($apartment->pieces->flatMap(function ($piece) {
            return $piece->images;
        }));

        $remainingImages = count($images) - 4;

        $amenities = $apartment->property->amenities;

        return view('web.apartments.show', compact('apartment', 'otherApartments', 'images', 'remainingImages', 'amenities'));
    }
    public function info(){

        return view('web.help');
    }
    public function help(){

        return view('web.aide');
    }

   public function proprietaire(){
    return view('proprietaires.index');
   }

    // public function search(Request $request)
    // {
    //     $query = Property::query();

    //     // Check if search criteria are present in the request
    //     if ($request->has('town')) {
    //         $query->where('town', 'like', '%' . $request->input('town') . '%');
    //     }

    //     if ($request->has('monthly_price')) {
    //         $query->where('monthly_price', '<=', $request->input('monthly_price'));
    //     }

    //     if ($request->has('size')) {
    //         $query->where('size', '>=', $request->input('size'));
    //     }

    //     // Execute the query to get the search results
    //     $properties = $query->get();

    //     // Assign an empty collection if no results are found
    //     if ($properties->isEmpty()) {
    //         $properties = new Collection();
    //     }

    //     return view('properties', compact('properties'));
        
        
    // }
    

}
