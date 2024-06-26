@if ($edit && $edit && $editCommentId == $comment->id)
    <x-card.comment.edit-comment 
        to="{{route('posts.comment.update', ['post' => $post ,'commentId' => $editCommentId])}}" 
        :post="$post" :comment="$comment" 
        :errors="$errors ?? null"
        />
@else
    <div>
        <div class="flex flex-row items-end gap-2">
            <h4 class="font-semibold">{{$comment->user->name}}</h4>
            <p class="text-sm opacity-60">{{$comment->created_at}}</p>
        </div>
        <p>{{$comment->body}}</p>
        <div class="flex flex-row items-center gap-2">
            @if (Auth::id() == $comment->user_id)
                <div>
                    <x-button variant="link" text="Edit" to="{{route('posts.comment.edit', ['post' => $post, 'commentId' => $comment->id])}}" />
                </div>
            @endif
            @if (Auth::id() == $comment->user_id || Auth::id() == $post->user_id)
                <form action="{{route('posts.comment.destroy', ['post' => $post, 'commentId' => $comment->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <x-button 
                        variant="link" 
                        text="Delete" 
                        type="submit"
                        />
                </form>
            @endif
        </div>
    </div>
@endif