<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $landlords = User::where('type', 'landlord')->get();
        return view('admin.dashboard', compact('landlords'));
    }

    public function profile()
    {
        $user = User::findOrFail(auth()->id());
        return view('admin.profile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id())],
        ]);
        $user = User::findOrFail(auth()->id());
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');

        $user->save();
        return back()->with('success', 'Successfully Modified Your Profile Details.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $changed = User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        if ($changed) {
            return back()->with('success', 'Successfully Modified Your Password.');
        } else {
            return back()->with('failed', 'Could not Modify Password');
        }
    }
}
