<?php

namespace App\Http\Controllers\Admin\Property;

use Illuminate\Http\Request;
use App\Models\ApartmentType;
use Illuminate\Support\Str;
use App\Models\Landlord;
use App\Models\Image;
use App\Models\Property;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        $landlords = Landlord::where('admin_id', auth('admin')->id())->get();

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
             'apartmentType' => ['required', 'array'],
             'apartmentType.*' => ['exists:apartment_types,id'],
             'location' => ['required', 'string', 'max:255'],
             'name' => ['required', 'string'],
             'landlord' => ['required', 'exists:landlords,id'], 
         ]);
     
         $property = new Property();
         $property->name = $request->input('name');
         $property->slug = Str::slug($request->input('name') . '-' . time());
         $property->location = $request->input('location');
         $property->admin_id = auth('admin')->id();
         $property->landlord_id = $request->input('landlord');
         $property->save();
     
         $apartmentTypes = $request->input('apartmentType');
     
         $property->apartmentTypes()->attach($apartmentTypes, ['property_id' => $property->id]);
     
         session(['new_prop_id' => $property->id]);
     
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

public function edit(Property $property)
{
    // Check if the logged-in user owns the property
    if ($property->admin_id !== auth('admin')->user()->id) {
        // Redirect or display an error message indicating unauthorized access
        return redirect()->back()->with('error', 'You are not authorized to edit this property.');
    }

    $landlords = Landlord::where('admin_id', auth('admin')->id())->get();
    $apt_types = ApartmentType::all();
    $selectedAptTypes = $property->apartmentTypes()->pluck('apartment_types.id')->toArray();

    return view('admin.property.edit', compact('property', 'apt_types', 'landlords', 'selectedAptTypes'));
}

   

    public function showPropertyImagesform($propertyId)
{
    $property = Property::where('admin_id', auth('admin')->id())->findOrFail($propertyId);
    $images = $property->images;

    return view('admin.property.show', compact('property', 'images'));
}

    public function storePropertyImage(Request $request, $propertyId)
    {
        // Retrieve the property
        $property = Property::findOrFail($propertyId);
        
        // Validate the uploaded images
        $request->validate([
            'images.*' => 'required|image|max:2048',
        ], [
            'images.*.required' => 'Veuillez sélectionner au moins une image.',
            'images.*.image' => 'Le fichier doit être une image.',
            'images.*.max' => 'L\'image ne doit pas dépasser 2 Mo.',
        ]);

        // Store the uploaded images
        $uploadedImages = [];
        $images = $request->file('images');
        if ($images) {
            foreach ($images as $uploadedImage) {
                $imagePath = $uploadedImage->store('property_images', 'public');
                $originalImageName = $uploadedImage->getClientOriginalName();
                $uniqueImageName = time() . '_' . $originalImageName;

                $image = new Image();
                $image->url = $imagePath;
                $image->imageable_id = $property->id;
                $image->imageable_type = Property::class;
                $uploadedImages[] = $image;
            }

            // Save the images using the morph relationship
            $property->images()->saveMany($uploadedImages);

            // Return a success message
            return redirect()->back()->with('success', 'Les images de propriété sont stockées avec succès.');
        }

        // Return to the form with an error message
        return redirect()->back()->withErrors(['images' => 'Veuillez sélectionner au moins une image.'])->withInput();
    }
    public function storePropertyImages(Request $request, $propertyId)
    {
        // Retrieve the piece
        $property = Property::findOrFail($propertyId);

        // Validate the uploaded images
        $request->validate([
            'images.*' => 'required|image|max:2048', // Assuming the image field name is 'images[]'
        ], [
            'images.*.required' => 'Veuillez sélectionner au moins une image.',
            'images.*.image' => 'Le fichier doit être une image.',
            'images.*.max' => 'L\'image ne doit pas dépasser 2 Mo.',
        ]);

        // Check if any images were uploaded
        if ($request->hasFile('images')) {
            // Store the uploaded images
            $uploadedImages = [];
            foreach ($request->file('images') as $uploadedImage) {
                $imagePath = $uploadedImage->store('Piece_images', 'public');
                $originalImageName = $uploadedImage->getClientOriginalName();
                $uniqueImageName = time() . '_' . $originalImageName;
        
                $image = new Image();
                $image->url = $imagePath;
                // $image->original_name = $originalImageName;
                $image->imageable_id = $property->id;
                $image->imageable_type = Property::class;
                $uploadedImages[] = $image;
            }
        
             // Save the images using the morph relationship
             $property->images()->saveMany($uploadedImages);
        
            // Return a response or redirect as needed
            return redirect()->back()->with('success', 'Les images de cette propriété sont stockées avec succès.');
        }
        
        // If no images were uploaded, return a response or redirect with an appropriate message
        return redirect()->back()->withErrors(['empty_form' => 'Veuillez sélectionner au moins une image.'])->withInput();
    
    }

    public function deletePropertyImage(Request $request, $propertyId)
    {
    // Retrieve the image
    $image = Image::findOrFail($id);
            
    // Delete the image file from storage
    Storage::disk('public')->delete($image->url);

    // Delete the image record from the database
    $image->delete();

        // Return a response or redirect as needed
        return redirect()->back()->with('success', 'L’image de la propriété a été supprimée avec succès.');
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
            'apartmentType' => ['required', 'array'],
            'apartmentType.*' => ['exists:apartment_types,id'],
            'location' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string'],
            'landlord' => ['required', 'exists:landlords,id'], 
        ]);
    
        $property = Property::findOrFail($id);
        $property->name = $request->input('name');
        $property->location = $request->input('location');
        $property->landlord_id = $request->input('landlord');
        $property->save();
    
        $apartmentTypes = $request->input('apartmentType');
        $property->apartmentTypes()->sync($apartmentTypes);
    
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
    
        // Delete the apartments associated with the property
        foreach ($property->apartments as $apt) {
            // Delete the pieces associated with each apartment
            foreach ($apt->pieces as $piece) {
                // Delete the images associated with each piece
                foreach ($piece->images as $image) {
                    // Delete the image file from storage
                    Storage::disk('public')->delete($image->url);
                    
                    // Delete the image record from the database
                    $image->delete();
                }
                
                // Delete the piece
                $piece->delete();
            }
            
            // Delete the images associated with the apartment
            foreach ($apt->images as $image) {
                // Delete the image file from storage
                Storage::disk('public')->delete($image->url);
                
                // Delete the image record from the database
                $image->delete();
            }
            
            // Delete the apartment
            $apt->delete();
        }
    
        // Delete the images associated with the property
        foreach ($property->images as $image) {
            // Delete the image file from storage
            Storage::disk('public')->delete($image->url);
            
            // Delete the image record from the database
            $image->delete();
        }
    
        // Delete the property
        $property->delete();
    
        return redirect()->route('admin.property.index');
    }
}
