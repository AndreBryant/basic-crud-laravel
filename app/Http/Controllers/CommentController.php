<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $request, Post $post) {
        $data = $request->validate([
            'body' => 'required'
        ]);
        $data['user_id'] = Auth::id();
        $data['post_id'] = $post->id;

        $newComment = Comment::create($data);

        return back()->with('success', 'Comment added successfully.');
    }

    public function edit(Post $post, $comment_id) {
        $comments = $post->comments()->with(['user:id,name'])->get();
        $post->load(['user:id,name']);
        $hasVoted = $post->votes()->where('user_id', auth()->id())->exists();

        return view('posts.detail', ['post' => $post, 'hasVoted' => $hasVoted, 'comments' => $comments, 'editCommentId' => $comment_id, 'edit' => true]);
    }

    public function update(Request $request, Post $post, $commentId) {
        $comment = Comment::findOrFail($commentId);
        $comment->body = $request->body;
        // dd($comment);
        $comment->save();

        return redirect(route('posts.detail', ['post' => $post]))->with('success', 'comment updated');
    }

    public function destroy(Post $post, $commentId) {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect(route('posts.detail', ['post' => $post]))->with('success', 'comment deleted.');
    }
}
