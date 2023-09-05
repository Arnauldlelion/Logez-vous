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

     public function dashboard(){
        return view('landlord.dashboard.index');
     }
    public function index()
    {
        $properties = Property::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        // $apt_types = explode((', ', ));
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
        //
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
       //
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
       //
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
        //
    }
}