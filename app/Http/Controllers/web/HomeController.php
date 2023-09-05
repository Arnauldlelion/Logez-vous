<?php

namespace App\Http\Controllers\web;

use App\Models\Appartment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
   public function index(){
    $apartments = Appartment::orderBy('created_at', 'desc')->with('images')->get();
     
    return view('index', compact('apartments'));
   }

  
   public function searchForm(){
    $apartments = Appartment::with('images')->get();

    return view('web.apartments', compact('apartments'));
   }

    public function showSingleAppartment($id)
    {
        $apartment = Appartment::with('images')->findOrFail($id);
        $otherApartments = Appartment::where('id', '!=', $apartment->id)->with('images')->limit(3)->get();

        return view('web.apartment', compact('apartment','otherApartments'));
    }

    public function help(){

        return view('web.aide');
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
