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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');

Route::post('/register/register', 'Auth\RegisterController@register')->name('register');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login_form');

Route::post('/auth/login', 'Auth\LoginController@login')->name('login');
Route::get('/test', 'Auth\LoginController@test');
Route::get('/reviews', 'ReviewsController@showReview');

Route::get('/send-reviews', 'ReviewsController@getDataReview');
Route::post('/send-review-data', 'ReviewsController@saveReview')->name('save_review');
Route::post('/transport', 'TransportController@getTransportsByCityId');