<?php

namespace App\Http\Controllers\Admin\Property;

use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('admin_id', auth('admin')->id())->get();
    
        return view('admin.property.index', compact('properties'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {
        $request->validate([
            'apartmentType' => ['required'],
            'location' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string']
        ]);
    
        $types = implode(', ', $request['apartmentType']);
        $property = $request->all();
        $property['apartmentType'] = $types;
        $property['admin_id'] = auth('admin')->id();
        $property['slug'] = Str::slug($request->get('name') . '-' . time());
    
        $createdProperty = Property::create($property);
    
        session(['new_prop_id' => $createdProperty->id]);
    
        return redirect()->route('admin.apartments.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findOrfail($id);
        session()->put('new_prop_id', $id);
        $apartments = $property->apartments;
        // dd($apartments);
        return view('admin.apartments.index', compact('apartments', 'property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $property = Property::where('slug', $slug)->first();
        $apt_types = explode(', ', $property->appartmentType);
        return view('landlord.property.edit', compact('property', 'apt_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'appartmentType' => ['required'],
            'location' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string']
        ]);

        $types = implode(', ', $request['appartmentType']);
        $property = Property::findOrFail($id);
        $property->name = $request->get('name');
        $property->location = $request->get('location');
        $property->appartmentType = $types;

        $property->save();

        return redirect()->route('landlord.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        foreach($property->apartments as $apt) {
            foreach($apt->pieces as $piece) {
                $piece->delete();
            }
            $apt->delete();
        }
        $property->delete();

        return redirect()->route('admin.property.index');
    }
}
