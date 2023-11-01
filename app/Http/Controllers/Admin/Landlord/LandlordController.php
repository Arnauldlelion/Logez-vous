<?php

namespace App\Http\Controllers\Admin\Landlord;

use App\Models\User;
use App\Models\Landlord;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LandlordController extends Controller
{
    protected $search = [
        'q' => null,
        'limit' => 20
    ];

    public function index(Request $request)
    {
        $search = $this->search;
        $landlords = new Landlord();

        if ($request->has('q')) {
            $search['q'] = $request->get('q');
            $landlords = $landlords->where('name', 'like', '%' . $search['q'] . '%');
        }

        if ($request->has('limit')) {
            $search['limit'] = $request->get('limit');
        }

        $loggedInUser = Auth::guard('admin')->user();

        if ($loggedInUser->super_admin) {
            $landlords = $landlords->paginate($search['limit']);
        } else {
            $landlords = $landlords->where('admin_id', $loggedInUser->id)->paginate($search['limit']);
        }

        return view('admin.landlords.index', compact('landlords', 'search'));
    }


    public function create($id = null)
    {
        if ($id === null) {
            // Create a new user
            $landlord = new User();
        } else {
            // Retrieve the user details
            $landlord = User::findOrFail($id);
        }

        return view('admin.landlords.create', compact('landlord'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => ['required', 'unique:landlords', 'regex:/^\d{9}$/'],
            'email' => ['required', 'string', 'email', 'unique:landlords'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['admin_id'] = Auth::guard('admin')->user()->id;

        $landlord = Landlord::create($input);

        // Delete the user from the users table
        User::where('email', $landlord->email)->delete();

        // Send the welcome email to the landlord
        Mail::to($landlord->email)->send(new WelcomeEmail($landlord, $request->password));

        return redirect()->route('admin.landlords.index')->with('success', 'Propriétaire créé avec succès');
    }

    public function show($id)
    {
        $landlord = Landlord::with('properties')->findOrFail($id);

        return view('admin.landlords.show', compact('landlord'));
    }

    public function edit($id)
    {
        $landlord = Landlord::findOrFail($id);

        return view('admin.landlords.edit', compact('landlord'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => ['required', 'unique:landlords,phone,' . $id, 'regex:/^\d{9}$/'],
            'email' => ['required', 'string', 'email', 'unique:landlords,email,' . $id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $landlord = Landlord::findOrFail($id);
        $input = $request->all();

        if ($request->has('password')) {
            $input['password'] = Hash::make($request->password);
        } else {
            unset($input['password']); // Remove the password field from the input if not provided
        }

        $landlord->update($input);

        return redirect()->route('admin.landlords.index')->with('success', 'Propriétaire mis à jour avec succès');
    }

    public function destroy($id)
    {
        $landlord = Landlord::findOrFail($id);
        $landlord->delete();

        return redirect()->route('admin.landlords.index')->with('success', 'Propriétaire supprimé avec succès');
    }
}