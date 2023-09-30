<?php

namespace App\Http\Controllers\Admin\Apartment;

use App\Models\Image;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\ApartmentType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.apartments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_prop_id = session('new_prop_id');
    
        if ($new_prop_id) {
            return view('admin.apartments.create', compact('new_prop_id'));
        }
    
        return redirect()->route('admin.property.index')->with('error', 'Invalid access');
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
            'floor' => ['required'],
            'furnished' => ['nullable', 'string', 'max:255'],
            'monthly_price' => ['required', 'string'],
            'number_of_pieces' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
        ]);
    
        $new_prop_id = session('new_prop_id');
    
        if (!$new_prop_id) {
            return redirect()->route('admin.property.index')->with('error', 'Invalid access');
        }
    
        $apartment = $request->all();
        $apartment['apt_type_id'] = 1; // Set the appropriate apartment type ID here
        $apartment['property_id'] = $new_prop_id;
        // dd($apartment);
        $createdApartment = Apartment::create($apartment);

        session(['new_apt_id' => $createdApartment->id]);
    
        return redirect()->route('admin.pieces.create', ['new_prop_id' => $new_prop_id]);
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrfail($id);
        session()->put('new_apt_id', $id);
        $pieces = $apartment->pieces;
        $aptImages = $apartment->images;
        return view('admin.pieces.index', compact('pieces', 'apartment', 'aptImages'));
    }

    // public function showRapports($id)
    // {
    //     $apartment = Apartment::findOrfail($id);
    //     session()->put('new_apt_id', $id);
    //     $rapports = $apartment->rapportDeGestions;
    //     return view('admin.rapports.index', compact('rapports', 'apartment'));
    // }

    public function showPayments($id)
    {
        $apartment = Apartment::findOrfail($id);
        session()->put('new_apt_id', $id);
        $payments = $apartment->payments;
        return view('admin.payments.index', compact('payments', 'apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apt = Apartment::findOrFail($id);
        return view('admin.apartments.edit', compact('apt'));
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
            'furnished' => ['nullable', 'string'],
            'monthly_price' => ['required', 'string'],
            'number_of_pieces' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
        ]);
        $apartment = Apartment::findOrFail($id);
        $apartment->floor = $request->get('floor');
        $apartment->furnished = $request->input('furnished');
        $apartment->monthly_price = $request->get('monthly_price');
        $apartment->number_of_pieces = $request->get('number_of_pieces');
        $apartment->description = $request->get('description');

        $apartment->save();
        return redirect()->route('admin.property.show', $new_prop_id);
    }

    public function showApartmentImagesform($id)
    {
        $apartment = Apartment::findOrFail($id);
        $images = $apartment->images;
    
        return view('admin.apartments.show', compact('apartment', 'images'));
    }
    
    public function storeApartmentImages(Request $request, $id)
    {
        // Retrieve the apartment
        $apartment = Apartment::findOrFail($id);
    
        // Validate the uploaded images
        $request->validate([
            'images.*' => 'required|image|max:2048', // Assuming the image field name is 'images[]'
        ]);
    
        // Store the uploaded images
        $uploadedImages = [];
        foreach ($request->file('images') as $uploadedImage) {
            $imagePath = $uploadedImage->store('Apartment_images', 'public');
            $originalImageName = $uploadedImage->getClientOriginalName();
            $uniqueImageName = time() . '_' . $originalImageName;
    
            $image = new Image();
            $image->url = $imagePath;
            // $image->original_name = $originalImageName;
            $image->imageable_id = $apartment->id;
            $image->imageable_type = Apartment::class;
            $uploadedImages[] = $image;
        }
    
        // Save the images using the morph relationship
        $apartment->images()->saveMany($uploadedImages);
    
        // Return a response or redirect as needed
        return redirect()->back()->with('success', 'Les images de appartement sont stockées avec succès.');
    }
    
    // public function deleteApartmentImage(Request $request, $id)
    // {
    //     // Retrieve the apartment
    //     $apartment = Apartment::findOrFail($id);
    
    //     // Get the image ID to delete from the request
    //     $imageId = $request->input('image_id');
    
    //     // Retrieve the image associated with the apartment
    //     $image = $apartment->images()->findOrFail($imageId);
    
    //     // Delete the image file from storage
    //     Storage::disk('public')->delete($image->url);
    
    //     // Delete the image record from the database
    //     $image->delete();
    
    //     // Return a response or redirect as needed
    //     return redirect()->back()->with('success', 'L’image de propriété a été supprimée avec succès.');
    // }
    public function deleteApartmentImage(Request $request, $id)
{
    // Retrieve the image
    $image = Image::findOrFail($id);
    
    // Delete the image file from storage
    Storage::disk('public')->delete($image->url);

    // Delete the image record from the database
    $image->delete();

    // Return a response or redirect as needed
    return redirect()->back()->with('success', 'L’image de l’appartement a été supprimée avec succès.');
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
                $coverImage->apartment_id = session('new_apt_id');
                $coverImage->isCover = true;
                $coverImage->url = $coverImageFile->store('apartimages', 'public');
                $coverImage->save();
            }
        }
    
        if ($request->hasFile('images')) {
            $images = $request->file('images');
    
            // Check if any images were uploaded
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $apt = new Image();
                    $apt->apartment_id = session('new_apt_id');
                    $apt->url = $image->store('apartimages', 'public');
                    $apt->save();
                }
            }
        }
    
        return back()->with('success', 'Images téléchargées avec succès!');
    }

    public function changeCoverImage(Request $request)
    {
        $request->validate([
            'image_id' => 'required|exists:images,id',
        ]);
    
        $imageId = $request->input('image_id');
    
        // Find the existing cover image
        $existingCoverImage = Image::where('apartment_id', session('new_apt_id'))
            ->where('iscover', true)
            ->first();
    
        // Update the existing cover image to remove the "is_cover" flag
        if ($existingCoverImage) {
            $existingCoverImage->iscover = false;
            $existingCoverImage->save();
        }
    
        // Find the new cover image
        $newCoverImage = Image::where('id', $imageId)
            ->where('apartment_id', session('new_apt_id'))
            ->first();
    
        // Update the new cover image to set the "is_cover" flag
        if ($newCoverImage) {
            $newCoverImage->iscover = true;
            $newCoverImage->save();
        }
    
        
        return back()->with('success', 'Images téléchargées avec succès!');
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
         $apt = Apartment::with('pieces.images')->findOrFail($id);
     
         // Delete the images associated with the apartment's pieces
         foreach ($apt->pieces as $piece) {
             foreach ($piece->images as $image) {
                 // Delete the image file from storage
                 Storage::disk('public')->delete($image->url);
                 
                 // Delete the image record from the database
                 $image->delete();
             }
         }
     
         // Delete the pieces associated with the apartment
         $apt->pieces()->delete();
     
         // Delete the images associated with the apartment
         foreach ($apt->images as $image) {
             // Delete the image file from storage
             Storage::disk('public')->delete($image->url);
             
             // Delete the image record from the database
             $image->delete();
         }
     
         // Delete the apartment
         $apt->delete();
     
         return redirect()->route('admin.property.show', $new_prop_id);
     }
}
