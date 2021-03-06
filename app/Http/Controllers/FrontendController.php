<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Models\About;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{

    private $lenghtPaginate = 5;
    

    public function index(Request $request){
    	$posts = Post::Published()->simplePaginate($this->lenghtPaginate);

        static::$name = "Home";

        if (isset($_GET['page'])) {
            static::$name = static::$name . ' - Page ' . $_GET['page'];
        }

    	return view('front.home', [
    		'posts' => $posts
    	]);
    }

    public function post($slug){

        if ($slug == 'admin') {
            return redirect()->route('dashboard');
        }

    	$post =  Post::Published()
                    ->where('slug', '=', $slug)
                    ->with('comments')
                    ->with('comments.responses')
                    ->first();

        if (is_null($post)) {
            abort(404);
        }

    	static::$name = $post->title;

    	return view('front.post', [
    		'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => Post::limit(5)->inRandomOrder()->get()
    	]);
    }

    public function storeComment(Request $request)
    {
        $data = [
            'name'       => $request->name,
            'email'      => $request->email,
            'body'       => $request->body,
            'post_id'    => $request->post_id,
            'comment_id' => $request->comment_id,
            'approved'   => 0
         ];

         $comment = Comment::create($data);

         CommentCreated::dispatch($comment);

         if (request()->ajax()) {
             return response()->json([
                'error' => 0,
                'message' => 'Comentario enviado, se requiere aprobación'
             ]);
         }

         //return back()->withFlash('Comentario agregado correctamente');
    }

    public function category($category){
        $cat = Category::where('slug', '=', $category)
                        ->first();

        if (!is_null($cat)) {
            static::$name = $cat->name;

            return view('front.home', [
                'posts' => $cat->posts()
                                ->Published()
                                ->simplePaginate($this->lenghtPaginate),
                'is_category' => true,
                'category' => $cat
            ]);
            

        } else {
            return abort(404);
        }
    }

    public function tag($tagName){
        $tag = Tag::where('slug', '=', $tagName)
                        ->first();

        if (!is_null($tag)) {

            static::$name = $tag->name;

            return view('front.home', [
                'posts' => $tag->posts()
                                ->Published()
                                ->simplePaginate($this->lenghtPaginate),
                'is_tag' => true,
                'tag' => $tag
            ]);
            

        } else {
            return abort(404);
        }
    }

    public function contact(Request $request)
    {
        static::$name = "Contact";

        return view('front.contact');
    }

    public function about(Request $request)
    {   
        static::$name = "About";

        $about = About::first();
        return view('front.about', [
            'about' => $about
        ]);
    }

    public function search(Request $request)
    {
        $posts = Post::Published()
                            ->where('title', 'LIKE', '%'.$request->s.'%')
                            ->simplePaginate($this->lenghtPaginate);

        static::$name = "Search: " . $request->s;

        return view('front.home', [
            'posts' => $posts,
            'is_search' => true,
            'searchTerm' => $request->s,
        ]);

    }




}
