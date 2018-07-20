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

Route::get('/', 'FrontendController@index')->name('frontend.index');

Route::get('posts', 'FrontendController@posts')->name('frontend.posts');

Route::get('/{post_slug}', 'FrontendController@post')->name('frontend.post');


Route::get('/admin', 'HomeController@index');

//Route::resource('actividads', 'ActividadController');


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
	Route::resource('posts', 'PostController');	
});


Auth::routes();

Route::resource('categories', 'CategoryController');

Route::resource('tags', 'TagController');