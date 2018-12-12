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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register-form');

Route::post('/register/register', 'Auth\RegisterController@register')->name('register');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login_form');

Route::post('/auth/login', 'Auth\LoginController@login')->name('login');
Route::get('/test', 'Auth\LoginController@test');
Route::get('/reviews', 'ReviewsController@showReview')->name('reviews');
Route::get('/register-token', 'Auth\RegisterController@getToken');
Route::post('/save-pass', 'Auth\RegisterController@savePass')->name('save_pass');



Route::get('/all', 'ReviewsController@allReviewGraphic');

Route::get('/test', 'GeoLocationController@getLocation');




Route::get('/show-reviews', 'ReviewsController@showReview')->name('show-reviews');
Route::post('/get-markers', 'ReviewsController@getMarker');

Route::post('/get-graphic-all', 'ReportingController@getAllData')->name('get-graphic-all');

Route::get('/send-reviews', 'ReviewsController@getDataReview');
Route::post('/send-review-data', 'ReviewsController@saveReview')->name('save_review');
Route::post('/transport', 'TransportController@getTransportsByCityId');

Route::get('/graphic_date', 'ReviewsController@reviewGraphicByDate');