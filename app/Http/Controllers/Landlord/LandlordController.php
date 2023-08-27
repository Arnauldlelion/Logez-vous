<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('user_id', auth()->id())->get();
        return view('landlord.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tenants()
    {
        return view('landlord.tenants');
    }

    public function profile()
    {
        $user = User::findOrFail(auth()->id());
        return view('landlord.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id())],
            'phone' => ['nullable', 'string'],
        ]);
        $user = User::findOrFail(auth()->id());
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');

        $user->save();
        return back()->with('success', 'Successfully Modified Your Profile Details.');
    }
    public function create()
    {
        return view('landlord.create_accom');
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
            'accomodation' => ['required', 'string', 'max:255'],
            'type' => ['required'],
            'description' => ['nullable', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'number_of_rooms' => ['required', 'string'],
            // Validate user type
            'need_tenant' => ['required', 'string'],
            'monthly_rent_price' => ['required', 'string', 'max:255'],
            'approx_surface_area' => ['nullable', 'string', 'max:255'],
            'furnished' => ['required', 'string'],
            'availability_date' => ['required'] // Validate user type
        ]);

        $property = $request->all();
        $type = implode(', ', $request['type']);
        $property['type'] = $type;
        $property['slug'] = Str::slug($request->get('accomodation') . '-' . time());
        $property['user_id'] = auth()->id();
        // dd($property);
        Property::create($property);
        return redirect()->route('landlord.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if (!$property) {
            abort(404);
        }

        $property->type = explode(', ', $property->type);
        // dd($property->type);
        return view('landlord.edit_accom', compact('property'));
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
            'accomodation' => ['required', 'string', 'max:255'],
            'type' => ['required'],
            'description' => ['nullable', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'number_of_rooms' => ['required', 'string'],
            // Validate user type
            'need_tenant' => ['required', 'string'],
            'monthly_rent_price' => ['required', 'string', 'max:255'],
            'approx_surface_area' => ['nullable', 'string', 'max:255'],
            'furnished' => ['required', 'string'],
            'availability_date' => ['required'] // Validate user type
        ]);

        $property = Property::findOrFail($id);
        $type = implode(', ', $request->get('type'));
        $property->accomodation = $request->get('accomodation');
        $property->type = $type;
        $property->description = $request->get('description');
        $property->location = $request->get('location');
        $property->number_of_rooms = $request->get('number_of_rooms');
        $property->need_tenant = $request->get('need_tenant');
        $property->monthly_rent_price = $request->get('monthly_rent_price');
        $property->approx_surface_area = $request->get('approx_surface_area');
        $property->furnished = $request->get('furnished');
        $property->availability_date = $request->get('availability_date');

        $property->save();

        return redirect()->route('landlord.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $changed = User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        if ($changed) {
            return back()->with('success', 'Successfully Modified Your Password.');
        } else {
            return back()->with('failed', 'Could not Modify Password');
        }
    }
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('landlord.index');
    }
}