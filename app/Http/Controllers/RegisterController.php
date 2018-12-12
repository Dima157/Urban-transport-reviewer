<?php

namespace App\Http\Controllers;

use App\Facebook\FacebookService;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $facebook = FacebookService::getClient();
        $url = $facebook->Url()->getAuthUrl();
        return view('register');
    }

    public function registerUser(RegisterRequest $request)
    {
        if($userData = $request->validated()) {

        } else {
            echo 'false';
        }
    }
}
