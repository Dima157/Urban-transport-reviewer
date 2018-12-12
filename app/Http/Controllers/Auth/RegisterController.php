<?php

namespace App\Http\Controllers\Auth;

use App\Facebook\FacebookService;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getToken(Request $r)
    {
        $facebook = FacebookService::getClient();
        $code = $r->get('code');
        if(empty($code)){
            echo 'empty code';
        }
        $provider = $facebook->getProvider();
        $token = $provider->getAccessToken('authorization_code', [
            'code' => $code
        ]);
        $user = $provider->getResourceOwner($token);
        $this->saveUser($user);
    }

    private function saveUser($user)
    {   if(!User::where('email', $user->getEmail())) {
            User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => '123'
            ]);
        }
        echo '1';
        return view('register-facebook', ['email' => $user->getEmail()]);
    }

    public function savePass(Request $r)
    {
        $user = User::where('email', $r->email)->get();
        $user->password = password_hash($r->pass);
        redirect('/');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
