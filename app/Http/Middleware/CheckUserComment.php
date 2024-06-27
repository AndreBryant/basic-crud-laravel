<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Comment;
use App\Models\Post;

class CheckUserComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $postId = $request->route('postId');
        $post = Post::findOrFail($postId);
        $commentId = $request->route('commentId');
        $comment = Comment::findOrFail($commentId);

        if (Auth::id() != $comment->user_id && Auth::id() != $post->user_id) {
            return back();
        }

        return $next($request);
    }
}
