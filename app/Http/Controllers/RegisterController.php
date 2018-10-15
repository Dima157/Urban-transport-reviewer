<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
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
