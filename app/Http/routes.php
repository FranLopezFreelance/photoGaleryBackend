<?php

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
		return view('welcome');
	});

//Backend
Route::resource('section', 'SectionsController');

//Create directliy by sections
Route::get('video/create/{section}', 'VideosController@createBySection');
Route::get('photo/create/{section}', 'PhotosController@createBySection');

Route::resource('photo', 'PhotosController');

Route::resource('video', 'VideosController');

//API Services for Frontend
Route::get('getSections', 'FrontController@getSections');
Route::get('getPhotosBySection/{section}', 'FrontController@getPhotosBySection');
Route::get('getVideosBySection/{section}', 'FrontController@getVideosBySection');

Route::auth();