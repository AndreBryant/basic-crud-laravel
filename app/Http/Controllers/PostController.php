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
        return redirect(route('posts.detail', ['postId' => $newPost->id]));
    }
    
    public function edit($postId) {
        $post = Post::findOrFail($postId);
        return view('posts.edit', ['post' => $post]);
    }

    public function update($postId, Request $request) {
        $post = Post::findOrFail($postId);
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'votes' => 'numeric',
            'user_id' => 'unsignedBigInteger'
        ]);

        $post->update($data);
        return redirect(route('posts.detail', ['postId' => $post->id]))->with('success', 'Post Updated.');
    }

    public function destroy($postId) {
        $post = Post::findOrFail($postId);
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Post Deleted');
    }

    public function vote($postId, Request $request) {
        $post = Post::findOrFail($postId);
        $post->votes += 1;
        $post->save();

        Vote::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return response()->json([
            'success' => true,
            'isVoted' => true,
            'rating' => $post->votes
        ]);
    }

    public function unvote($postId, Request $request) {
        $post = Post::findOrFail($postId);
        $user = Auth::user();

        $vote = Vote::where('user_id', $user->id)
                    ->where('post_id', $post->id)
                    ->first();
    
        if ($vote) {
            $post->votes -= 1;
            $post->save();
            $vote->delete();
    
            return response()->json([
                'success' => true,
                'isVoted' => false,
                'rating' => $post->votes
            ]);
        }
    }

    public function detail($postId) {
        $post = Post::findOrFail($postId);
        $comments = $post->comments()->with(['user:id,name'])->get()->sortBy('created_at')->reverse();
        $post->load(['user:id,name']);
        $hasVoted = $post->votes()->where('user_id', auth()->id())->exists();

        return view('posts.detail', ['post' => $post, 'hasVoted' => $hasVoted, 'comments' => $comments, 'edit' => false]);
    }
}
