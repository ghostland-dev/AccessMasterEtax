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
            'profile'   => ['required', 'mimes:jpeg,jpg,bmp,png,svg'],
            'userName'  => ['required', 'string', 'max:50', 'unique:users'],
            'firstName' => ['required', 'string', 'max:50'],
            'lastName'  => ['required', 'string', 'max:50'],
            'tel'       => ['required', 'string', 'regex:/^(\+|0)\d{9}$/'],
            'fix'       => ['required', 'string', 'regex:/^(\+|0)\d{9}$/'],
            'job'       => ['required', 'string', 'max:50'],
            'siren'     => ['required', 'string', 'max:8', 'regex:/^\d{2}[-\s]?\d{3}[-\s]?\d{3}[-\s]?\d{3}$/', 'unique:users'],
            'email'     => ['required', 'string', 'email', 'max:100', 'unique:users', 'regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/'],
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
         $siren = str_replace(['-', ' '], '', $data['siren']);
          // Check if SIREN exists using Pappers API
        $response = Http::get("https://api.pappers.fr/v2/siret/$siren", [
            'api_token' => '97a405f1664a83329a7d89ebf51dc227b90633c4ba4a2575',
        ]);

        if ($response->failed() || !$response->json('etablissement')) {
            // SIREN not found, display error message and clear the field
            return back()
                ->withInput($request->except('siren'))
                ->withErrors(['siren' => 'invalide ou inexistant SIREN']);
        }

        return User::create([
            'userName' => $data['userName'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'tel' => $data['tel'],
            'fix' => $data['fix'],
            'job' => $data['job'],
            'siren' => $siren,
            'email' => $data['email'],
            'profile' => $data['profile']->store('avatars', 'public'),
            'password' => Hash::make($data['password']),
        ]);

    }
}
