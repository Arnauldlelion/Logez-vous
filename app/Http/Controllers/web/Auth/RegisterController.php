<?php

namespace App\Http\Controllers\web\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'unique:users'],
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

         // Redirect to a thank you page or display a success message
        //  return redirect()->route('thankyou');
         return redirect()->back();
    }
}
