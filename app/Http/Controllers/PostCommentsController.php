<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\PostComment;
use App\Http\Controllers\Traits\FileUploadTrait;

class PostCommentsController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $data = [
                'user_id' => \Auth::user()->id,
                'comment' => $request->comment,
                'post_id' => $request->post_id
            ];
        $course = PostComment::create($data);

        return redirect()->back();
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

    public function destroy($id)
    {
        $post = PostComment::whereId($id)->delete();
        return redirect()->back();
    }
}
