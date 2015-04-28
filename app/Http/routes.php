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

Route::get('/', 'WelcomeController@index');

Route::get('/about', 'WelcomeController@about');

Route::get('/classes/search', 'SearchController@search');
Route::get('/classes', 'SearchController@results');

Route::get('/classes/id/{id}', 'YogaClassController@show');
Route::post('/classes/id/{id}', 'YogaClassController@rate');
Route::get('/classes/add', 'YogaClassController@add');
Route::post('/classes/add', 'YogaClassController@save');

Route::get('/studios', function(){ return redirect('/studios/location/all'); });
Route::get('/studios/id/{id}', 'StudioController@show');
Route::post('/studios/id/{id}', 'StudioController@rate');
Route::get('/studios/location/{location_name?}', 'StudioController@showByLocation')
	->where('location_name', '(.*)');
Route::get('/studios/add', 'StudioController@add');
Route::post('/studios/add', 'StudioController@save');

Route::get('/eager-loading', 'LoadingController@eagerLoading');

Route::get('/signup', 'AuthController@signup');
Route::post('/signup', 'AuthController@create');
Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@authenticate');
Route::get('/profile', 'AuthController@profile');
Route::post('/profile/change_username', 'AuthController@change_username');
Route::post('/profile/change_password', 'AuthController@change_password');
Route::post('/profile/delete', 'AuthController@delete');
Route::get('/manage', 'AuthController@manage');
Route::get('/logout', 'AuthController@logout');