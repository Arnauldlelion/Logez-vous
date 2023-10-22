<?php

namespace App\Http\Controllers\Admin\PieceTypes;

use App\Models\PieceType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PieceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piece_types = PieceType::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.piece_types.index', compact('piece_types'));
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
            'name' => 'required|unique:piece_types,name',
        ]);

        $piece_type = new PieceType();
        $piece_type->name = $request->get('name');
        $piece_type->save();

        return redirect()->route('admin.piece_types.index');
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
        $data['piece_type'] = PieceType::findOrFail($id);

        return view('admin.piece_types.edit', $data);
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
                Rule::unique("piece_types", "name")->ignore($id)
            ],
        ]);
        $piece_type = PieceType::findOrFail($id);
        $piece_type->name = $request->get('name');

        $piece_type->save();

        return redirect()->route('admin.piece_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piece_type = PieceType::findOrFail($id);
        $piece_type->delete();

        return redirect()->route('admin.piece_types.index');
    }
}
