<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class MainController extends Controller
{ 
    public function index()
    { 
        $properties = Property::all($columns = ['*']); // Fetch all properties from the database
        return view('index', ['properties' => $properties]);

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
    
    public function singleAppartment($name)
    {
        return view('appartment');
    }
}
