<?php

namespace App\Http\Controllers\Admin\Landlord;

use App\Models\Landlord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    protected $search = [
        'q' => null,
        'limit' => 20
    ];

    //
      public function index(Request $request)
    {
        $search = $this->search;
        $landlords = new Landlord();
    
        if ($request->get('q')) {
            $search['q'] = $request->get('q');
            $landlords = $landlords->where('name', 'like', '%' . $search['q'] . '%');
        }
    
        if ($request->get('limit')) {
            $search['limit'] = $request->get('limit');
        }
    
        $loggedInUser = auth('admin')->user();
    
        if ($loggedInUser->super_admin) {
            // Show all landlords for the super admin
            $landlords = $landlords->paginate($search['limit']);
        } else {
            // Show landlords associated with the logged-in admin
            $landlords = $landlords->whereHas('admin', function ($query) use ($loggedInUser) {
                $query->where('id', $loggedInUser->id);
            })->paginate($search['limit']);
        }
    
        return view('admin.landlords.index', compact('landlords', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.landlords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => ['required', 'unique:landlords'],
            'email' => ['required', 'string', 'email', 'unique:landlords'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
      
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['password'] = \Hash::make($request->password);
        $input['admin_id'] = auth('admin')->user()->id; // Assign the admin_id value
      
        $landlord = Landlord::create($input);
        return redirect()->to(route('admin.landlords.index'))->with('success', "Propriétaire créé avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function show($id)
    {

        $landlord = Landlord::with('properties')->findOrFail($id);

        return view('admin.landlords.show',
            compact('landlord'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy($id)
    {
        $landlord = Landlord::findOrFail($id);
    
        // Retrieve properties associated with the landlord
        $properties = $landlord->properties;
    
        foreach ($properties as $property) {
            // Retrieve apartments associated with the property
            $apartments = $property->apartments;
    
            foreach ($apartments as $apartment) {
                // Retrieve prices associated with the apartment
                $pieces = $apartment->pieces;
    
                foreach ($pieces as $piece) {
                    // Delete each price
                    $piece->delete();
                }
    
                // Delete the apartment
                $apartment->delete();
            }
    
            // Delete the property
            $property->delete();
        }
    
        // Delete the landlord
        $landlord->delete();
    
        session()->flash('success', 'Propriétaire supprimé avec succès');
    
        return redirect()->to(route('admin.approuved-landlords.index'));
    }
}
