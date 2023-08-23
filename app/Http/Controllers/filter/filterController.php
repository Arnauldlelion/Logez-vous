<?php

namespace App\Http\Controllers\filter;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class filterController extends Controller
{
    //
    public function filterResults(Request $request)
    {
        $priceMin = $request->input('price_min');
        $priceMax = $request->input('price_max');

        $filteredResults = Property::whereBetween('price', [$priceMin, $priceMax])->get();
        
        // Return the filtered results as a response (e.g., JSON response)
        return response()->json($filteredResults);
    }
}
