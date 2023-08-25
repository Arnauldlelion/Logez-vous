<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Image;

class PropertiesController extends Controller
{
    public function properties()
    {
        $data = Property::all();
      

        return view('properties', compact('data'));
    }

    public function create()
    {
        return view('create-property');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'town' => 'required',
            'quarter' => 'required',
            'monthly_price' => 'required|numeric',
            'size' => 'required|numeric',
            'pieces' => 'required|numeric',
            'description' => 'required',
            'furnished' => 'boolean', // Added field: boolean validation
            'floor' => 'required|in:ground,first,second,third,fourth,fifth', // Added field: enumeration validation
        ]);

        $imagePath = $request->file('image')->store('images');

        $data = new Property;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage', $imageName);
        
            $data->image = $imageName;
        }
        
        // Save the $data object or perform any other required operations

       
$data->type = $request->input('type');
$data->description = $request->input('description');
$data->town = $request->input('town');
$data->quarter = $request->input('quarter');
$data->monthly_price = $request->input('monthly_price');
$data->size = $request->input('size');
$data->pieces = $request->input('pieces');
$data->furnished = $request->input('furnished');
$data->floor = $request->input('floor');

$data->save();
        return redirect()->route('properties')->with('success', 'New property created successfully.');
    }

    public function recent()
    {
        $properties = Property::latest()->take(10)->get(); // Retrieve the 10 most recent properties
    
        return view('recent-properties', ['properties' => $properties]);
    }
    


}
    
