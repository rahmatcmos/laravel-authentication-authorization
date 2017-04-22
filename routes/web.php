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

Route::get('/home', ['middleware' => 'auth', function () {
    return "Anda berhasil login";
}]);

Route::get('settings', ['middleware' => 'auth', 'uses' => 'HomeController@settings']);

Route::get('event', ['middleware' => ['auth', 'role:organizer'], function() {
    return "Berhasil mengakses halaman event";
}]);

Route::get('event-history', ['middleware' => ['auth', 'role:participant'], function() {
    return "Berhasil mengakses history event.";
}]);

Route::get('join-event/{id}', 'HomeController@joinEvent');
Route::get('edit-event/{id}', 'HomeController@editEvent');

// Premium Access
Route::get('premium', ['middleware' => ['auth'], 'uses' => 'HomeController@premium']);

// Socialite
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', ['middleware' => 'auth', 'uses' => 'HomeController@index']);

// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['uses' => 'Auth\ResetPasswordController@reset']);
