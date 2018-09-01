<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\PostRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PostController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;

    public static $name = "Posts";

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepository = $postRepo;
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->postRepository->pushCriteria(new RequestCriteria($request));
        $posts = $this->postRepository->all();

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        //dd($request->all());

        $input = $request->all();

        $post = Post::create($input);

        if ($request->has('tags')) {
            //$post->tags()->sync($request->tags);
            $post->syncTags($request->tags);
        }

        if ($request->has('categories')) {
            $post->syncCategories($request->categories);
        }

        if ($request->has('archives')) {
            $post->saveArvhives($request);
        }

        PostCreated::dispatch($post);

        Cache::flush();


        Flash::success('Post saved successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        return view('posts.edit', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'post' =>  $post
        ]);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int              $id
     * @param UpdatePostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        $post->update($request->all());

        if ($request->has('tags')) {
            $post->syncTags($request->tags);
        } else {
            $post->tags()->detach();
        }

        if ($request->has('categories')) {
            $post->syncCategories($request->categories);
        } else {
            $post->categories()->detach();
        }

        Cache::flush();

        Flash::success('Post updated successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        $this->postRepository->delete($id);

        $post->comments->each->delete();

        $post->archives->each->delete();

        $post->categories->each->delete();

        $post->tags->each->delete();

        Flash::success('Post deleted successfully.');

        return redirect(route('posts.index'));

        Cache::flush();
    }

    public function publishe($id)
    {
        $post = Post::find($id);
        
        $status = !$post->published;
        $text = $status 
                    ? 'Publicado'
                    : 'Marcado como no publicado';

        $post->published = $status;
        $post->save();

        // dd($comment);

        Cache::flush();

        Flash::success('Comentario ' . $text . ' Con éxito' );

        return back();
    }
}
