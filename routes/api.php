<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('actividads', 'ActividadAPIController');

Route::resource('posts', 'PostAPIController');

Route::resource('categories', 'CategoryAPIController');

Route::resource('tags', 'TagAPIController');

Route::resource('comments', 'CommentAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('social_networks', 'SocialNetworkAPIController');