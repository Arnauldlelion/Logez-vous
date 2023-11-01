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


    public function showSingleAppartment($id)
    {
        $apartment = Apartment::with(['images', 'pieces.images', 'property.amenities'])
            ->findOrFail($id);

            // dd($apartment->id);
        $otherApartments = Apartment::where('id', '!=', $apartment->id)
            ->with('images')
            ->get();

        // Retrieve the images belonging to both the apartment and piece
        $images = $apartment->images->merge($apartment->pieces->flatMap(function ($piece) {
            return $piece->images;
        }));


        $remainingImages = count($images) - 4;

        // Get all pieces belonging to the apartment with their images
        $pieces = $apartment->pieces()->with('images')->get();

        $amenities = $apartment->property->amenities;

        return view('web.apartments.show', compact('apartment', 'otherApartments', 'images', 'remainingImages', 'amenities', 'pieces'));
    }

  
    // public function searchForm(Request $request)
    // {
    //     if ($request->isMethod('post')) {
    //         // Form has been submitted, perform the filtering logic
    
    //         // Get the selected room options from the form request
    //         $selectedRooms = $request->input('rooms', []);
    
    //         // Get the minimum and maximum price inputs from the form request
    //         $minPrice = $request->input('min_price', 0);
    //         $maxPrice = $request->input('max_price', 10000);
    
    //         // Get the minimum and maximum surface area inputs from the form request
    //         $minSurfaceArea = $request->input('min_surface_area', 0);
    //         $maxSurfaceArea = $request->input('max_surface_area', 100);
    
    //         // Get the furnished option from the form request
    //         $furnishedOption = $request->input('furnished');
    
    //         // Get the keyword from the form request
    //         $keyword = $request->input('keyword');
    
    //         // Check if cancel button was clicked
    //         $cancel = $request->input('cancel');
    
    //         if ($cancel) {
    //             // Clear the keyword if cancel button was clicked
    //             $keyword = '';
    //         }
    
    //         // Perform the filtering logic
    //         $query = Apartment::whereBetween('monthly_price', [$minPrice, $maxPrice])
    //             ->whereBetween('size', [$minSurfaceArea, $maxSurfaceArea]);
    
    //         if (!empty($selectedRooms)) {
    //             $query->whereIn('number_of_pieces', $selectedRooms);
    //         }
    
    //         // Filter based on furnished option
    //         if ($furnishedOption === 'meublé') {
    //             $query->where('furnished', 'Meublé');
    //         } elseif ($furnishedOption === 'Non meublé') {
    //             $query->where('furnished', 'Non meublé');
    //         }
    
    //         // Filter based on keyword
    //         if (!empty($keyword)) {
    //             $query->where(function ($q) use ($keyword) {
    //                 $q->where('name', 'like', "%{$keyword}%")
    //                     ->orWhere('description', 'like', "%{$keyword}%");
    //             });
    //         }
    
    //         $apartments = $query->get();
    
    //         // Pass the filtered apartments and keyword to the view
    //         return view('web.apartments.index', compact('apartments', 'keyword'));
    //     } else {
    //         // Initial display of the view, no form submission yet
    //         $apartments = Apartment::all(); // Retrieve all apartments
    //         $keyword = '';
    //         return view('web.apartments.index', compact('apartments', 'keyword'));
    //     }
    // }
    public function searchForm(Request $request)
{
    if ($request->isMethod('post')) {
        // Form has been submitted, perform the filtering logic

        // Get the selected room options from the form request
        $selectedRooms = $request->input('rooms', []);

        // Get the minimum and maximum price inputs from the form request
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 10000);

        // Get the minimum and maximum surface area inputs from the form request
        $minSurfaceArea = $request->input('min_surface_area', 0);
        $maxSurfaceArea = $request->input('max_surface_area', 100);

        // Get the furnished option from the form request
        $furnishedOption = $request->input('furnished');

        // Get the keyword from the form request
        $keyword = $request->input('keyword');

        // Check if cancel button was clicked
        $cancel = $request->input('cancel');

        if ($cancel) {
            // Clear the keyword if cancel button was clicked
            $keyword = '';
        }

        // Perform the filtering logic
        $query = Apartment::query();

        // Filter based on price range
        $query->whereBetween('monthly_price', [$minPrice, $maxPrice]);

        // Filter based on surface area range
        $query->whereBetween('size', [$minSurfaceArea, $maxSurfaceArea]);

        if (!empty($selectedRooms)) {
            $query->whereIn('number_of_pieces', $selectedRooms);
        }

        // Filter based on furnished option
        if ($furnishedOption === 'meublé') {
            $query->where('furnished', 'Meublé');
        } elseif ($furnishedOption === 'Non meublé') {
            $query->where('furnished', 'Non meublé');
        }

        // Filter based on keyword
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        $apartments = $query->get();

        // Pass the filtered apartments and keyword to the view
        return view('web.apartments.index', compact('apartments', 'keyword'));
    } else {
        // Initial display of the view, no form submission yet
        $apartments = Apartment::all(); // Retrieve all apartments
        $keyword = '';
        return view('web.apartments.index', compact('apartments', 'keyword'));
    }
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

    public function search(Request $request)
    {
        $query = Property::query();

        // Check if search criteria are present in the request
        if ($request->has('town')) {
            $query->where('town', 'like', '%' . $request->input('town') . '%');
        }

        if ($request->has('monthly_price')) {
            $query->where('monthly_price', '<=', $request->input('monthly_price'));
        }

        if ($request->has('size')) {
            $query->where('size', '>=', $request->input('size'));
        }

        // Execute the query to get the search results
        $properties = $query->get();

        // Assign an empty collection if no results are found
        if ($properties->isEmpty()) {
            $properties = new Collection();
        }

        return view('properties', compact('properties'));
  
        
    }
    

}
