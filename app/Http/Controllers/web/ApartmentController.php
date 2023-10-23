<?php

namespace App\Http\Controllers\web;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    //
    public function filter(Request $request)
    {
        // Get the selected room options from the form request
        $selectedRooms = $request->input('rooms', []);

        // Get the minimum and maximum price inputs from the form request
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 10000);

        // Get the minimum and maximum surface area inputs from the form request
        $minSurfaceArea = $request->input('min_surface_area', 0);
        $maxSurfaceArea = $request->input('max_surface_area', 100);

        // Perform the filtering logic
        $query = Apartment::whereBetween('monthly_price', [$minPrice, $maxPrice])
            ->whereBetween('size', [$minSurfaceArea, $maxSurfaceArea]);

        if (!empty($selectedRooms)) {
            $query->whereIn('rooms', $selectedRooms);
        }

        $filteredApartments = $query->get();

        // Pass the filtered apartments to the view
        return view('web.apartments.index', compact('filteredApartments'));
    }
}
