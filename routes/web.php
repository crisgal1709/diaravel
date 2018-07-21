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

Route::get('post/{post_slug}', 'FrontendController@post')->name('frontend.post');
Route::get('category/{category}', 'FrontendController@category')->name('frontend.category');
Route::get('tag/{tag}', 'FrontendController@tag')->name('frontend.tag');
Route::get('contacto', 'FrontendController@contact')->name('frontend.contact');

Route::post('storeComment', 'FrontendController@storeComment')->name('frontend.storeComment');


Route::get('/admin', 'HomeController@index')->name('dashboard');

//Route::resource('actividads', 'ActividadController');


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
	Route::resource('posts', 'PostController');	
	Route::resource('categories', 'CategoryController');
	Route::resource('tags', 'TagController');
	Route::resource('comments', 'CommentController');
	Route::get('approveComment/{comment_id}', 'CommentController@approve')->name('comments.approve');
});


Auth::routes();




