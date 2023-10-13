<?php

namespace App\Http\Controllers\web\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm()
    {
       return view('web.gestion');
      }
   
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'alpha', 'max:255'],
            'last_name' => ['required', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'unique:users', 'regex:/^\d{9}$/'],
            'location' => 'required',
            'description' => 'required',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $admin = User::create($input);

        Alert::success('success', 'thanks');
         return redirect()->back();
    }
}
