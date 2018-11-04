<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');

Route::post('/register/register', 'Auth\RegisterController@register')->name('register');

Route::get('/login', 'Auth\LoginController@showLoginForm');

Route::post('/auth/login', 'Auth\LoginController@login')->name('login');
Route::post('/test', 'Auth\LoginController@test');