<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create() {
        return view('posts.create');
    }

    public function post(Request $request) {
        $likes = $request->input('likes', 0);
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'likes' => 'nullable|numeric'
        ]);

        $newPost = Post::create($data);

        return redirect(route('posts.index'));
    }
}
