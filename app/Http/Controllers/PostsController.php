<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Post;
use App\Http\Controllers\Traits\FileUploadTrait;

class PostsController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
        \View::share('pageTitle', \Lang::get('global.posts.title'));
    }

    public function index(Request $request){
        $posts = isset($request->user_id) ? Post::whereUserId($request->user_id) : Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostsRequest $request)
    {
        $request = $this->saveFiles($request);
        $data = [
                'user_id' => \Auth::user()->id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'published' => $request->published,
                'slug' => \Str::slug($request->title)
            ];

        $course = Post::create($data);

        return redirect('/home');
    }

    public function show($id, $slug)
    {
        $post = Post::whereId($id)->where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::whereId($id)->firstOrFail();
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $data = [
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'published' => $request->published,
            'slug' => \Str::slug($request->title)
        ];
        $post = Post::findOrFail($id);
        $post->update($data);

        return redirect()->route('posts.show', [$post->id, $post->slug]);
    }

    public function delete($id)
    {
        $post = Post::whereId($id)->first();
        $post->delete();
        $post->comments()->delete();
        return redirect('home');
    }
}
