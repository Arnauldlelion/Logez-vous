<?php

namespace App\Http\Controllers\Admin\Administrator;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Admincontroller extends Controller
{

    protected $search = [
        'q' => null,
        'limit' => 20
    ];

    //
    public function index(Request $request)
    {
        $search = $this->search;
        $admins = new Admin();

        if ($request->get('q')) {
            $search['q'] = $request->get('q');
            $admins = $admins->where('name', 'like', '%' . $search['q'] . '%');
        }

        if ($request->get('limit')) {
            $search['limit'] = $request->get('limit');
        }
        $admins = $admins->paginate($search['limit']);
        return view('admin.admin.index', compact('admins', 'search'));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['password'] = \Hash::make($request->password);
        $admin = Admin::create($input);
        return redirect()->to(route('admin.administrator.index'))->with('success', "Gestionnaires créé avec succès");
    }

    public function show($id)
    {
        $user = Admin::with('landlords')->findOrFail($id);
        return view('admin.admin.show',
            compact('user'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        session()->flash('success', 'Mise à jour réussie');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        if ($user->super_admin) {
            session()->flash('error', 'The action cannot be performed on the super administrator');
        }
        else {
            if ($user->id == Auth::guard('admin')->user()->id) {
                session()->flash('error', 'Cannot perform this action on yourself');
            }
            else {
                $sudo = Admin::where('super_admin', true)->first();
                if ($sudo) {
                    $user->posts()->update([
                        'user_id' => $sudo->id
                    ]);
                }

                $user->delete();
                session()->flash('success', 'Admin successfully deleted');
            }
        }
        return redirect()->to(route('admin.administrator.index'));
    }

        public function approve(User $user)
    {
        $user->is_approved = true;
        $user->save();

        return redirect()->back()->with('message', 'Approuvé avec succès.');
    }

    public function reject(User $user)
    {
        $user->delete();

        return redirect()->back()->with('message', 'Utilisateur rejeté et supprimé avec succès.');
    }
}