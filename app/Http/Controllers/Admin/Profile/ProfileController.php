<?php

namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    function getProfile()
    {
        $user = Auth('admin')->user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * @desc Handle Update profile update form submission
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editProfile(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $user = Auth('admin')->user();
        $user->name = $request['name'];
        $user->about = $request['about'];
        $user->save();

        $request->session()->flash('success', __('Profile edited successfully.'));
        return redirect()->back();
    }

    /**
     * @desc Change admin password
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $messages = [
            'current_password.required' => __('Enter old password'),
            'password.required'         => __('Enter new password'),
        ];

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password'         => 'required|min:6|confirmed',
        ], $messages);

        // Ensure that user's password matches password from the form
        $validator->after(function ($validator) use ($request) {
            $current_password = Auth('admin')->user()->password;
            if (!Hash::check($request['current_password'], $current_password)) {
                $validator->errors()->add('current_password',
                    __('The password provided does not match with your current password.'));
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth('admin')->user();
        $user->password = Hash::make($request['password']);
        $user->update();

        $request->session()->flash('success', __('Password changed successfully.'));
        return redirect()->back();

    }
}


