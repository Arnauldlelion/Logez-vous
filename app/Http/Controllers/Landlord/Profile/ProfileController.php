<?php

namespace App\Http\Controllers\Landlord\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
        //
        function getProfile()
        {
            $user = Auth('landlord')->user();
            return view('landlord.profile.index', compact('user'));
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
    
            $user = Auth('landlord')->user();
            $user->name = $request['name'];
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
                'current_password.required' => __('Entrez l’ancien mot de passe'),
                'password.required'         => __('Entrez un nouveau mot de passe'),
            ];
    
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'password'         => 'required|min:6|confirmed',
            ], $messages);
    
            // Ensure that user's password matches password from the form
            $validator->after(function ($validator) use ($request) {
                $current_password = Auth('landlord')->user()->password;
                if (!Hash::check($request['current_password'], $current_password)) {
                    $validator->errors()->add('current_password',
                        __('Le mot de passe fourni ne correspond pas à votre mot de passe actuel.'));
                }
            });
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
    
            $user = Auth('landlord')->user();
            $user->password = Hash::make($request['password']);
            $user->update();
    
            $request->session()->flash('success', __('Le mot de passe a été modifié avec succès.'));
            return redirect()->back();
    
        }
}
