<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'DESC')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
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
            'name' => 'required',
            'video' => 'nullable',
            'title' => 'required',
            'description' => 'required|string',
            'photo' => 'nullable|image'
        ]);

        $testimonial = new Testimonial;
        $testimonial->name = $request->get('name');
        $testimonial->title = $request->get('title');
        $testimonial->video = $request->get('video');
        $testimonial->description = $request->get('description');
        if ($request->hasFile('photo')) {
            $testimonial->photo = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->save();

        return redirect()->route('admins.testimonials.index');
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
    public function edit(Request $request, $id)
    {
        $data['testimony'] = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', $data);
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
            'name' => 'required',
            'video' => 'nullable',
            'title' => 'required',
            'description' => 'required|string',
            'photo' => 'nullable|image'
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->get('name');
        $testimonial->title = $request->get('title');
        $testimonial->video = $request->get('video');
        $testimonial->description = $request->get('description');
        if ($request->hasFile('photo')) {
            Storage::delete($testimonial->photo);
            $testimonial->photo = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->save();

        return redirect()->route('admins.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        Storage::delete($testimonial->photo);
        $testimonial->delete();

        return redirect()->route('admins.testimonials.index');
    }
}
