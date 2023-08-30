<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PiecesType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PiecesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piece_types = PiecesType::orderBy('created_at', 'DESC')->paginate(20);
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
            'name' => 'required|unique:pieces_types,name',
        ]);

        $piece_types = new PiecesType();
        $piece_types->name = $request->get('name');
        $piece_types->save();

        return redirect()->route('admins.piece_types.index');
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
        $data['piece_type'] = PiecesType::findOrFail($id);

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
                Rule::unique("pieces_types", "name")->ignore($id)
            ],
        ]);
        $piece_type = PiecesType::findOrFail($id);
        $piece_type->name = $request->get('name');

        $piece_type->save();

        return redirect()->route('admins.piece_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piece_type = PiecesType::findOrFail($id);
        $piece_type->delete();

        return redirect()->route('admins.piece_types.index');
    }
}
