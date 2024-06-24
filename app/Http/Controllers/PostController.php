<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Vote;
use App\Models\Comment;


class PostController extends Controller
{
    public function index() {
        $posts = Post::with(['user:id,name'])->get()->sortBy('created_at')->reverse();
        $userVotes = Vote::where('user_id', Auth::id())->pluck('post_id')->toArray();

        return view('posts.index', ['posts' => $posts, 'userVotes' => $userVotes]);
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
        return redirect(route('posts.detail', ['post' => $newPost]));
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
        return redirect(route('posts.detail', ['post' => $post]))->with('success', 'Post Updated.');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Post Deleted');
    }

    public function vote(Post $post, Request $request) {
        $post->votes += 1;
        $post->save();

        Vote::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return back()->with('success', 'Post voted');
    }

    public function unvote(Post $post, Request $request) {
        $user = Auth::user();

        $vote = Vote::where('user_id', $user->id)
                    ->where('post_id', $post->id)
                    ->first();
    
        if ($vote) {
            $post->votes -= 1;
            $post->save();
            $vote->delete();
    
            return back()->with('success', 'Vote removed successfully.');
        }
    }

    public function detail(Post $post) {
        $comments = $post->comments()->with(['user:id,name'])->get()->sortBy('created_at')->reverse();
        $post->load(['user:id,name']);
        $hasVoted = $post->votes()->where('user_id', auth()->id())->exists();

        return view('posts.detail', ['post' => $post, 'hasVoted' => $hasVoted, 'comments' => $comments, 'edit' => false]);
    }
}
