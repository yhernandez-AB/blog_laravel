<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create(Post $post){
        return view('posts.create', ['post' => $post]);
    }

    public function store(Request $request){
        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
        ]);
        return redirect()->route('posts.edit', $post);
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function destroy(Post $post){
        $post->delete();

        return back();
    }
}
