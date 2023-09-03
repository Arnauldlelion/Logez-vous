<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\RapportDeGestion;
use Illuminate\Http\Request;

class RapportController extends Controller
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
            return view('landlord.rapports.create');
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
            'annee_construction' => ['required'],
            'nombreDeLocataire' => ['required', 'integer'],
            'dureeDuLocataire' => ['required', 'string', 'max:255'],
        ]);
        $rapport = new RapportDeGestion();
        $rapport->annee_construction = $request->get('annee_construction');
        $rapport->nombreDeLocataire = $request->get('nombreDeLocataire');
        $rapport->dureeDuLocataire = $request->get('dureeDuLocataire');
        $rapport->appartment_id = $new_apt_id;
        $rapport->save();
        return redirect()->route('landlord.apartments.showRapports', $new_apt_id);
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
        $rapport = RapportDeGestion::findOrFail($id);
        return view('landlord.rapports.edit', compact('rapport'));
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
            'annee_construction' => ['required'],
            'nombreDeLocataire' => ['required', 'integer'],
            'dureeDuLocataire' => ['required', 'string', 'max:255'],
        ]);
        $rapport = RapportDeGestion::findOrFail($id);
        $rapport->annee_construction = $request->get('annee_construction');
        $rapport->nombreDeLocataire = $request->get('nombreDeLocataire');
        $rapport->dureeDuLocataire = $request->get('dureeDuLocataire');
        $rapport->save();
        return redirect()->route('landlord.apartments.showRapports', $new_apt_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_apt_id = session('new_apt_id');
        $rapport = RapportDeGestion::findOrFail($id);
        $rapport->delete();

        return redirect()->route('landlord.apartments.showRapports', $new_apt_id);
    }
}
