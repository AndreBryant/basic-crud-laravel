<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create() {
        return view('posts.create');
    }

    public function post(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $data['votes'] = 0;
        $data['user_id'] = Auth::id();

        $newPost = Post::create($data);
        return redirect(route('posts.index'));
    }
    
    public function edit(Post $post) {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'votes' => 'numeric',
            'user_id' => 'unsignedBigInteger'
        ]);

        $post->update($data);
        return redirect(route('posts.index'))->with('success', 'Post Updated.');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Post Deleted');
    }
}
