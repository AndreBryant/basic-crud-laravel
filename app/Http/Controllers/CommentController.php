<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $request, $postId) {
        $data = $request->validate([
            'body' => 'required'
        ]);
        $data['user_id'] = Auth::id();
        $data['post_id'] = $postId;
        
        $newComment = Comment::create($data);

        return back()->with('success', 'Comment added successfully.');
    }

    public function edit($postId, $comment_id) {
        $post = Post::findOrFail($postId);
        $comments = $post->comments()->with(['user:id,name'])->get()->sortBy('created_at')->reverse();
        $post->load(['user:id,name']);
        $hasVoted = $post->votes()->where('user_id', auth()->id())->exists();

        return view('posts.detail', [
            'post' => $post, 
            'hasVoted' => $hasVoted, 
            'comments' => $comments, 
            'editCommentId' => $comment_id, 
            'edit' => true
        ]);
    }

    public function update(Request $request, $postId, $commentId) {
        $comment = Comment::findOrFail($commentId);
    
        $validatedData = $request->validate([
            'body' => 'required'
        ]);
        
        $comment->body = $validatedData['body'];
        $comment->save();
        
        return redirect(route('posts.detail', ['postId' => $postId]))->with('success', 'comment updated');
    }

    public function destroy($postId, $commentId) {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect(route('posts.detail', ['postId' => $postId]))->with('success', 'comment deleted.');
    }
}
