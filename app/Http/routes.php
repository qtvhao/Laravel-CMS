<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
	return redirect()->route('posts.index');
});

Route::auth();

Route::get('posts/search', [
	'uses' => 'PostController@search',
	'as' => 'posts.search',
]);
Route::resource('posts', 'PostController');
Route::get('/home', 'HomeController@index');
Route::resource('tags', 'TagController');

Route::auth();

Route::get('/home', 'HomeController@index');
