<?php

namespace App\Http\Controllers\Admin\Landlord;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandlordController extends Controller
{
    //
    protected $search = [
        'q' => null,
        'limit' => 20
    ];

    //
    public function index(Request $request)
    {
        $search = $this->search;
        $landlords = new User();

        if ($request->get('q')) {
            $search['q'] = $request->get('q');
            $landlords = $landlords->where('name', 'like', '%' . $search['q'] . '%');
        }

        if ($request->get('limit')) {
            $search['limit'] = $request->get('limit');
        }
        $landlords = $landlords->where('is_approved', true)->paginate($search['limit']);
        return view('admin.landlords.index', compact('landlords', 'search'));
    }

    function show($id)
    {

        $landlord = User::findOrFail($id);

        return view('admin.landlords.show',
            compact('landlord'));

    }

    public function destroy($id)
    {
        $landlord = User::findOrFail($id);
         $landlord->delete();

                session()->flash('success', 'Propriétaire supprimé avec succès');
        
        return redirect()->to(route('admin.approuved-landlords.index'));
    }
}
