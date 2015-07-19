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

//Main
Route::get('/', [
	'as'   => 'main.index',
	'uses' => 'MainController@index'
]);

Route::get('/home', [
	'as'   => 'main.home',
	'uses' => 'MainController@home'
]);

//API
Route::group(array('prefix' => 'api/v1'), function() {
	Route::resource('data', 'DataController');
});


//User
Route::post('/api/sign/up', [
	'as'   => 'user.signup',
	'uses' => 'UserController@signup'
]);

Route::post('/api/sign/in', [
	'as'   => 'user.signin',
	'uses' => 'UserController@signin'
]);

Route::get('/api/sign/out', [
	'as'   => 'user.signout',
	'uses' => "UserController@signout"
]);