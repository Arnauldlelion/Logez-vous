<?php

namespace App\Http\Controllers\Admin\Pieces;

use App\Models\Image;
use App\Models\Pieces;
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
        if (session()->has('new_apt_id')) {
            return view('landlord.pieces.create');
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
        $new_apt_id = session('new_apt_id');
        $request->validate([
            'pieces_types_id' => ['required'],
            'nombre_of_pieces' => ['required', 'integer'],
            'size' => ['required', 'string', 'max:255'],
        ]);
        $piece = new Pieces();
        $piece->nombre_of_pieces = $request->get('nombre_of_pieces');
        $piece->size = $request->get('size');
        $piece->pieces_types_id = $request->get('pieces_types_id');
        $piece->appartment_id = $new_apt_id;
        $piece->save();
        return redirect()->route('landlord.apartments.show', $new_apt_id);
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
        $piece = Pieces::findOrFail($id);
        return view('landlord.pieces.edit', compact('piece'));
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
            'pieces_types_id' => ['required'],
            'nombre_of_pieces' => ['required', 'integer'],
            'size' => ['required', 'string', 'max:255'],
        ]);
        $piece = Pieces::findOrFail($id);
        $piece->nombre_of_pieces = $request->get('nombre_of_pieces');
        $piece->size = $request->get('size');
        $piece->pieces_types_id = $request->get('pieces_types_id');
        $piece->save();
        return redirect()->route('landlord.apartments.show', $new_apt_id);
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
             $existingCoverImage = Image::where('appartment_id', session('new_apt_id'))
             ->where('id', '1')
             ->first();
     
         // Update the existing cover image to remove the "is_cover" flag
             $existingCoverImage->iscover = true;
             $existingCoverImage->save();

        return redirect()->route('landlord.apartments.show', session('new_apt_id'));
    }
    public function destroy($id)
    {
        $new_apt_id = session('new_apt_id');
        $piece = Pieces::findOrFail($id);
        $piece->delete();

        return redirect()->route('landlord.apartments.show', $new_apt_id);
    }
}

