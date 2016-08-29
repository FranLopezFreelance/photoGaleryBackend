<?php

Route::get('/', function () {
		return view('frontend.home');
	});

Route::get('/backend', function () {
		return view('welcome');
	});

//Backend

//Sections
Route::resource('backend/section', 'SectionsController');

//Photos
Route::resource('backend/photo', 'PhotosController');

//Add Image to Photo gallery
Route::post('backend/photo/addImage/{photo}', 'PhotosController@addImage');

//Show Images
Route::get('backend/photo/image/{name}', ['uses' => 'PhotosController@getImage', 'as' => 'photo.image']);
//Delete Image
Route::delete('image/{image}', 'PhotosController@destroyImage');

//Videos
Route::resource('backend/video', 'VideosController');

//Create directly by section
Route::get('backend/section/create/{section}', 'SectionsController@createBySection');
Route::get('backend/video/create/{section}', 'VideosController@createBySection');
Route::get('backend/photo/create/{section}', 'PhotosController@createBySection');

//API Services for Frontend
Route::get('getSections', 'FrontController@getSections');
Route::get('getPhotosBySection/{section}', 'FrontController@getPhotosBySection');
Route::get('getVideosBySection/{section}', 'FrontController@getVideosBySection');

Route::auth();