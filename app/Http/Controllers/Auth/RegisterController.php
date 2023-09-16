<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Auth;
// use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LANDLORD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:landlord');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required', 'in:landlord,admin'], // Validate user type
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

     public function index() {
    }

    // public function createBizUser(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     $user = User::create([
    //         'email' => $request['email'],
    //         'name' => $request['name'],
    //         'phone' => $request['phone'],
    //         'type' => $request['type'],
    //         'password' => Hash::make($request['password']),
    //     ]);
        
    //     return redirect()->intended('/login');
    // }

    public function createBizUser(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = User::create([
            'email' => $request['email'],
            'name' => $request['name'],
            'phone' => $request['phone'],
            'type' => $request['type'],
            'password' => Hash::make($request['password']),
        ]);

        Auth::login($user); // Log in the newly created user

        return redirect()->intended('landlord/dashboard'); // Redirect to the dashboard or any other desired page after login
    }
    //  protected function create(array $data)
    // {
    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     // Dispatch the Registered event
    //     // Cookie::forget('laravel_session');
    //     // Cookie::forget('XSRF-TOKEN');

    //     return $user;
    // }
}