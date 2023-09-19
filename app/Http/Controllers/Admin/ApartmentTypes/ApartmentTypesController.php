<?php

namespace App\Http\Controllers\Admin\ApartmentTypes;

use Illuminate\Http\Request;
use App\Models\ApartmentType;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ApartmentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apt_types = ApartmentType::orderBy('created_at', 'DESC')->get();
        return view('admin.apartment_types.index', compact('apt_types'));
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
        $request->validate([
            'name' => 'required|unique:apartment_types,name',
        ]);

        $apt_type = new ApartmentType();
        $apt_type->name = $request->get('name');
        $apt_type->save();

        return redirect()->route('admin.apartment_types.index');
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
        $data['apt_type'] = ApartmentType::findOrFail($id);

        return view('admin.apartment_types.edit', $data);
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
            'name' => [
                'required',
                Rule::unique("apartment_types", "name")->ignore($id)
            ],
        ]);
        $apt_type = ApartmentType::findOrFail($id);
        $apt_type->name = $request->get('name');

        $apt_type->save();

        return redirect()->route('admin.apartment_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apt_type = ApartmentType::findOrFail($id);
        $apt_type->delete();

        return redirect()->route('admin.apartment_types.index');
    }
}
