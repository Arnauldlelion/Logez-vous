<?php

namespace App\Http\Controllers\Admin\Amenity;

use App\Models\Amenity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AmenityController extends Controller
{
    //
     public function index(){
        $amenities = Amenity::orderBy('created_at', 'DESC')->paginate(20);

        return view('admin.amenities.index', compact('amenities'));
    }

    public function create() {
        return view('admin.amenities.create');
    }

    public function store(Request $request){
        request()->validate([
            'name'  => 'required',
            'image' => 'nullable|mimes:jpg,png,svg',
        ]);

         //Upload image if present
         if ($request->file('image')) {
            $request->image->storeAs('images', time() . '_' . $request->image->getClientOriginalName(), 'public');
            $image = 'images/' . time() . '_' . $request->image->getClientOriginalName();
        } else {
            $image = null;
        }

        $amenity = new Amenity();
        $amenity->name = $request->name;
        $amenity->image =$image;
        $amenity->save();

        session()->flash("success", 'Commodité créée avec succès');
        return redirect()->route('admin.amenities.index');
    }


    public function edit($id) {
        $amenity = Amenity::findorFail($id);
        return view('admin.amenities.edit', compact('amenity'));
    }


    public function update(Request $request, $id) {
        request()->validate([
            'name' => 'required|unique:amenities,name,' . $id,
            'image' => 'nullable|mimes:jpg,png,svg,' . $id,
        ]);

        $amenity = Amenity::findorFail($id);

        //Upload if image present
        if ($request->hasFile('image')) {
            Storage::delete('/' . $post->image);
            $request->image->storeAs('posts', time() . '_' . $request->image->getClientOriginalName(), 'public');
            $image = 'images/' . time() . '_' . $request->image->getClientOriginalName();
        } else {
            $image = $image->image;
        }


        $amenity->name = $request->name;
        $amenity->image = $image;
        $amenity->save();
       
        session()->flash('success', 'Commodité mise à jour avec succès');

        return redirect()->route('admin.amenities.index');

    }


    public function destroy($id) {
        $amenity = Amenity::findorFail($id);

        if($amenity->image){
            Storage::delete(''. $amenity->image);
        }

        $amenity->delete();
        session()->flash('success', 'Commodité supprimée avec succès');

        return redirect()->route('admin.amenities.index');
    }

}
