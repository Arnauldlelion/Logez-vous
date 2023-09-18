<?php

namespace App\Http\Controllers\web;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    //
    public function filterApartments(Request $request)
    {
        // Retrieve and validate the input data
        $validatedData = $request->validate([
            'min_price' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|min:0',
        ]);
    
        $minPrice = $validatedData['min_price'];
        $maxPrice = $validatedData['max_price'];
    
        $apartments = Apartment::whereBetween('monthly_price', [$minPrice, $maxPrice])
            ->orderBy('created_at', 'desc')
            ->with('images')
            ->limit(8)
            ->get();
    
        return view('web.apartments', compact('apartments'));
    }
    
    public function countApartments(Request $request)
    {
        // Retrieve the input data
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
    
        // Perform the query to count the apartments within the range
        $count = Apartment::whereBetween('monthly_price', [$minPrice, $maxPrice])
            ->count();
    
        return response()->json(['count' => $count]);
    }
}
