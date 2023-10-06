<?php

namespace App\Http\Controllers\Admin\Pieces;

use App\Models\Image;
use App\Models\Piece;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PiecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_apt_id = session('new_apt_id');
    
        if ($new_apt_id) {
            return view('admin.pieces.create', compact('new_apt_id'));
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
        $new_apt_id = session('new_apt_id');
        $request->validate([
            'piece_types_id' => ['required'],
            'nombre_of_pieces' => ['required', 'integer'],
            'size' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        $piece = new Piece();
        $piece->nombre_of_pieces = $request->get('nombre_of_pieces');
        $piece->size = $request->get('size');
        $piece->piece_types_id = $request->get('piece_types_id');
        $piece->apartment_id = $new_apt_id;
        $piece->description = $request->get('description');
        $piece->save();
        return redirect()->route('admin.apartments.show', $new_apt_id);
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
        $piece = Piece::findOrFail($id);
        return view('admin.pieces.edit', compact('piece'));
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
        $new_apt_id = session('new_apt_id');
        $request->validate([
            'piece_types_id' => ['required'],
            'nombre_of_pieces' => ['required', 'integer'],
            'size' => ['required', 'string', 'max:255'],
        ]);
        $piece = Piece::findOrFail($id);
        $piece->nombre_of_pieces = $request->get('nombre_of_pieces');
        $piece->size = $request->get('size');
        $piece->piece_types_id = $request->get('piece_types_id');
        $piece->description = $request->get('description');
        $piece->save();
        return redirect()->route('admin.apartments.show', $new_apt_id);
    }

    public function showPieceImagesform($id)
    {
        $piece = Piece::findOrFail($id);
        $images = $piece->images;
    
        return view('admin.pieces.show', compact('piece', 'images'));
    }

    
    
    public function storePieceImages(Request $request, $id)
    {
        // Retrieve the piece
        $piece = Piece::findOrFail($id);

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
                $imagePath = $uploadedImage->storeAs('Piece_images', time() . '_' . $uploadedImage->getClientOriginalName(), 'public');
        
                $image = new Image();
                $image->url = $imagePath;
                $image->imageable_id = $piece->id;
                $image->imageable_type = Piece::class;
                $uploadedImages[] = $image;
            }
    
        
            // Save the images using the morph relationship
            $piece->images()->saveMany($uploadedImages);
        
            // Return a response or redirect as needed
            return redirect()->back()->with('success', 'Les images de cette pièce sont stockées avec succès.');
        }
        
        // If no images were uploaded, return a response or redirect with an appropriate message
        return redirect()->back()->withErrors(['empty_form' => 'Veuillez sélectionner au moins une image.']);
    }
    public function deletePieceImage(Request $request, $id)
    {
        // Retrieve the image
        $image = Image::findOrFail($id);
        
        // Delete the image file from storage
        Storage::disk('public')->delete($image->url);
    
        // Delete the image record from the database
        $image->delete();
    
        // Return a response or redirect as needed
        return redirect()->back()->with('success', 'L’image de la pièce a été supprimée avec succès.');
    }
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

 
 
    public function destroy($id)
    {
        $new_apt_id = session('new_apt_id');
        $piece = Piece::findOrFail($id);
    
        // Delete the images associated with the piece
        $images = $piece->images;
        foreach ($images as $image) {
            // Delete the image file from storage
            if (Storage::disk('public')->exists($image->url)) {
                Storage::disk('public')->delete($image->url);
            }
    
            // Delete the image record from the database
            $image->delete();
        }
    
        // Delete the piece
        $piece->delete();
    
        return redirect()->route('admin.apartments.show', $new_apt_id);
    }
}

