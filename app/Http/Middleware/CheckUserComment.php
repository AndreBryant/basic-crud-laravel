<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Comment;

class CheckUserComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->method() != 'GET') {
            return back();
        }

        $commentId = $request->route('commentId');
        $comment = Comment::findOrFail($commentId);

        $userId = $comment->user_id;

        if (Auth::id() != $userId) {
            return back();
        }

        return $next($request);
    }
}
