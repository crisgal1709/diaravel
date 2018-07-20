<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    

    public function index(Request $request){
    	$posts = Post::Published();

    	return view('front.home', [
    		'posts' => $posts
    	]);
    }

    public function post($slug){



    	$post = Post::where('slug', '=', $slug)
    				->with('categories')
    				->with('tags')
    				->with('archives')
    				->first();

    	static::$name = $post->title;

    	return view('front.post', [
    		'post' => $post,
    	]);
    }




}
