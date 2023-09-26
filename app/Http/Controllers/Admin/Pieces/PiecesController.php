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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroyImage($id)
    {
        $image = Image::findOrFail($id);
        
        Storage::delete($image->photo);
        $image->delete();
             // Find the existing cover image
             $existingCoverImage = Image::where('apartment_id', session('new_apt_id'))
             ->where('id', '1')
             ->first();
     
         // Update the existing cover image to remove the "is_cover" flag
             $existingCoverImage->iscover = true;
             $existingCoverImage->save();

        return redirect()->route('admin.apartments.show', session('new_apt_id'));
    }
    // public function destroy($id)
    // {
    //     $new_apt_id = session('new_apt_id');
    //     $piece = Piece::findOrFail($id);
    //     $piece->delete();

    //     return redirect()->route('admin.apartments.show', $new_apt_id);
    // }
    public function destroy($id)
    {
        $new_apt_id = session('new_apt_id');
        $piece = Piece::findOrFail($id);

        // Delete the image file from the folder
        if ($piece->image) {
            $imagePath = public_path($piece->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $piece->delete();

        return redirect()->route('admin.apartments.show', $new_apt_id);
    }
}

