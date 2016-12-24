<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//example nisarg

Route::get('/','UserController@index');

Route::get('users/create',['uses' => 'UserController@create']);

Route::post('users',['uses' => 'UserController@store']);
Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('page','PagesController@index');



Route::get('blade','PagesController@blade');

Route::group(['middleware' => 'authenticated'], function(){

	Route::get('users','UserController@index');

	Route::get('profile','PagesController@profile');

	Route::get('settings','PagesController@settings');

});

Route::group(['prefix'=>'customUser','middleware'=>'auth'], function(){
	Route::get('create','CustomUserController@create'); //display form
	Route::post('create','CustomUserController@store'); //post data into store function
	Route::get('/','CustomUserController@index');
	Route::get('edit/{id}','CustomUserController@edit');
	Route::get('destroy/{id}','CustomUserController@destroy');
	Route::patch('update/{id}','CustomUserController@update');
});

Route::group(['prefix'=>'image','middleware'=>'auth'],function(){
	Route::get('imageUpload','ImageController@create');
	Route::post('imageUpload','ImageController@store');
	Route::get('','ImageController@index');
});
