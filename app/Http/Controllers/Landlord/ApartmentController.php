<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Appartment;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('landlord.apartment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('new_prop_id')) {
            return view('landlord.apartments.create');
        }
        return redirect()->route('landlord.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_prop_id = session('new_prop_id');
        $request->validate([
            'floor' => ['required'],
            'furnished' => ['nullable', 'string', 'max:255'],
            'monthly_price' => ['required', 'string'],
            'number_of_appartments' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
        ]);
        $apartment = $request->all();
        $apartment['apt_type_id'] = 6;
        $apartment['property_id'] = $new_prop_id;
        Appartment::create($apartment);
        return redirect()->route('landlord.pieces.create', $new_prop_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Appartment::findOrfail($id);
        session()->put('new_apt_id', $id);
        $pieces = $apartment->pieces;
        $aptImages = $apartment->images;
        return view('landlord.pieces.index', compact('pieces', 'apartment', 'aptImages'));
    }

    public function showRapports($id)
    {
        $apartment = Appartment::findOrfail($id);
        session()->put('new_apt_id', $id);
        $rapports = $apartment->rapportDeGestions;
        return view('landlord.rapports.index', compact('rapports', 'apartment'));
    }

    public function showPayments($id)
    {
        $apartment = Appartment::findOrfail($id);
        session()->put('new_apt_id', $id);
        $payments = $apartment->payments;
        return view('landlord.payments.index', compact('payments', 'apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apt = Appartment::findOrFail($id);
        return view('landlord.apartments.edit', compact('apt'));
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
        $new_prop_id = session('new_prop_id');
        $request->validate([
            'floor' => ['required'],
            'furnished' => ['nullable', 'string', 'max:255'],
            'monthly_price' => ['required', 'string'],
            'number_of_appartments' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
        ]);
        $apartment = Appartment::findOrFail($id);
        $apartment->floor = $request->get('floor');
        $apartment->furnished = $request->get('furnished');
        $apartment->monthly_price = $request->get('monthly_price');
        $apartment->number_of_appartments = $request->get('number_of_appartments');
        $apartment->description = $request->get('description');

        $apartment->save();
        return redirect()->route('landlord.property.show', $new_prop_id);
    }

  

    public function storeImages(Request $request)
    {
        $request->validate([
            'images.*' => 'nullable|image',
            'cover_image.*' => 'nullable|image',
        ]);
    
        if ($request->hasFile('cover_image')) {
            $coverImageFile = $request->file('cover_image');
    
            // Check if a cover image was uploaded
            if ($coverImageFile->isValid()) {
                $coverImage = new Image();
                $coverImage->appartment_id = session('new_apt_id');
                $coverImage->isCover = true;
                $coverImage->url = $coverImageFile->store('appartments', 'public');
                $coverImage->save();
            }
        }
    
        if ($request->hasFile('images')) {
            $images = $request->file('images');
    
            // Check if any images were uploaded
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $apt = new Image();
                    $apt->appartment_id = session('new_apt_id');
                    $apt->url = $image->store('appartments', 'public');
                    $apt->save();
                }
            }
        }
    
        return back()->with('success', 'Images Uploaded Successfully!');
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_prop_id = session('new_prop_id');
        $apt = Appartment::findOrFail($id);
        foreach ($apt->pieces as $piece) {
            $piece->delete();
        }
        $apt->delete();

        return redirect()->route('landlord.property.show', $new_prop_id);
    }
}