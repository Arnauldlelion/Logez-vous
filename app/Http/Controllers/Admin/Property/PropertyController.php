<?php

namespace App\Http\Controllers\Admin\Property;

use App\Models\User;
use App\Models\Landlord;
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
        $landlords = Landlord::get();

        return view('admin.property.create', compact('landlords'));
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
             'name' => ['required', 'string'],
            //  'landlord' => ['required', 'exists:users,id']
             'landlord' => ['required', 'exists:landlords,id'], 
         ]);
     
         $types = implode(', ', $request['apartmentType']);
         $property = $request->all();
         $property['apartmentType'] = $types;
         $property['admin_id'] = auth('admin')->id();
         $property['slug'] = Str::slug($request->get('name') . '-' . time());
         $property['landlord_id'] = $request->input('landlord');
     
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
    // public function edit($slug)
    // {
    //     $property = Property::where('slug', $slug)->first();
    //     $apt_types = explode(', ', $property->apartmentTypes);
    //     return view('admin.property.edit', compact('property', 'apt_types'));
    // }
    public function edit($slug)
{
    $property = Property::where('slug', $slug)->first();

    // Check if the logged-in user owns the property
    if ($property->user_id !== auth('admin')->user()->id) {
        // Redirect or display an error message indicating unauthorized access
        return redirect()->back()->with('error', 'You are not authorized to edit this property.');
    }

    $apt_types = explode(', ', $property->apartmentTypes);
    return view('admin.property.edit', compact('property', 'apt_types'));
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
            'apartmentType' => ['required'],
            'location' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string']
        ]);

        $types = implode(', ', $request['apartmentType']);
        $property = Property::findOrFail($id);
        $property->name = $request->get('name');
        $property->location = $request->get('location');
        $property->appartmentType = $types;

        $property->save();

        return redirect()->route('admin.property.index');
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
