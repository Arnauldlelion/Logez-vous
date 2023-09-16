<?php

namespace App\Http\Controllers\Admin\Property;

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
        //
        return view('landlord.dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landlord.property.create');
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
            'appartmentType' => ['required'],
            'location' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string']
        ]);
        $types = implode(', ', $request['appartmentType']);
        $property = $request->all();
        $property['appartmentType'] = $types;
        $property['user_id'] = auth()->id();
        $property['slug'] = Str::slug($request->get('name') . '-' . time());
        // dd($property);
        Property::create($property);
        return redirect()->route('landlord.apartments.create');
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
        $apartments = $property->appartments;
        // dd($apartments);
        return view('landlord.apartments.index', compact('apartments', 'property'));
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
        foreach($property->appartments as $apt) {
            foreach($apt->pieces as $piece) {
                $piece->delete();
            }
            $apt->delete();
        }
        $property->delete();

        return redirect()->route('landlord.index');
    }
}
