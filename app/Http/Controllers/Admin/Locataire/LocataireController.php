<?php

namespace App\Http\Controllers\Admin\Locataire;

use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LocataireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $search = [
        'q' => null,
        'limit' => 20
    ];
    
    public function index(Request $request)
    {
        //
        $search = $this->search;
        $tenants = new Locataire();
    
        $adminPropertyIds = auth('admin')->user()->properties()->pluck('id')->toArray();
    
        $tenants = $tenants->where('is_approved', true)
            ->whereHas('apartment', function ($query) use ($adminPropertyIds) {
                $query->whereIn('property_id', $adminPropertyIds);
            });
    
        if ($request->has('q')) {
            $search['q'] = $request->get('q');
            $tenants = $tenants->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search['q'] . '%')
                    ->orWhere('last_name', 'like', '%' . $search['q'] . '%');
            });
        }
    
        if ($request->has('limit')) {
            $search['limit'] = $request->get('limit');
        }
    
        $tenants = $tenants->paginate($search['limit']);
    
        return view('admin.tenants.index', compact('tenants', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        $tenant = Locataire::findOrFail($id);
        $admin = Auth::guard('admin')->user(); // Assuming the logged-in user is the admin
        $admin->load('properties.apartments'); // Eager load the properties and their apartments

        return view('admin.tenants.edit', compact('tenant', 'admin'));
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
        $validatedData = $request->validate([
            'first_name' => ['required', 'alpha', 'max:255'],
            'last_name' => ['required', 'alpha', 'max:255'],
            'phone' => ['required', Rule::unique('locataires')->ignore($id), 'regex:/^\d{9}$/'],
            'email' => ['required', 'email', Rule::unique('locataires')->ignore($id)],
            'apartment' => ['required', 'exists:apartments,id'],
        ]);
    
        $tenant = Locataire::findOrFail($id);
        $tenant->first_name = $validatedData['first_name'];
        $tenant->last_name = $validatedData['last_name'];
        $tenant->phone = $validatedData['phone'];
        $tenant->email = $validatedData['email'];
        $tenant->apartment_id = $validatedData['apartment'];

        $tenant->save();
    
        return redirect()->route('admin.tenants.index')->with('success', 'Les information du locataire a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tenant = Locataire::findOrFail($id);
        $apartment = $tenant->apartment;
        $apartment->published = false;
        $apartment->save();
        $tenant->delete();

        return redirect()->back()->with('success', 'Locataire supprimé avec succès.');
    }

}
