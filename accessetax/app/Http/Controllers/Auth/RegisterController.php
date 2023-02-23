<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'userName'  => ['required', 'string', 'max:50','unique:users'],
            'firstName' => ['required', 'string', 'max:50'],
            'lastName'  => ['required', 'string', 'max:50'],
            'tel'       => ['required', 'string', 'max:15','unique:users'],
            'fix'       => ['required', 'string', 'max:15'],
            'job'       => ['required', 'string', 'max:50'],
            'siren'     => ['required', 'string', 'max:15'],
            'profile'   => ['required', 'mimes:jpeg,bmp,png,svg'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'userName' => $data['userName'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'tel' => $data['tel'],
            'fix' => $data['fix'],
            'job' => $data['job'],
            'siren' => $data['siren'],
            'email' => $data['email'],
            'profile' => $data['profile']->store('avatars', 'public'),
            'password' => Hash::make($data['password']),
        ]);
    }
}
