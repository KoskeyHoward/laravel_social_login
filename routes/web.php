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



Route::get('auth/facebook', 'FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'FacebookController@handleFacebookCallback');

Route::get('auth/twiiter', 'TwitterController@redirectToTwitter');
Route::get('auth/twiiter/callback', 'TwitterController@handleTwitterCallback');

Route::get('auth/github', 'GithubController@redirectToGithub');
Route::get('auth/github/callback', 'GithubController@handleGithubCallback');

Route::get('auth/linkedin', 'LinkedinController@redirectToLinkedin');
Route::get('auth/linkedin/callback', 'LinkedinController@handleLinkedinCallback');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
