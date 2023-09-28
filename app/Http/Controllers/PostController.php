<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store, destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(10);

        return view('posts.post', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

        if ($request->user()) {
            $request->user()->posts()->create($request->only('body'));
        } else {
            return Redirect::route('login')->with('status', 'Login to create posts ');
        }

        return back()->with('status', 'Post created successfully');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}