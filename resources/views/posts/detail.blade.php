<x-app-layout>
    <div class="w-full h-full flex flex-col px-8 pt-8 gap-2 xl:px-80">
        <div>
            <a href="{{route('posts.index')}}">
                <button class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                    back to posts
                </button>
            </a>
        </div>
        <div class="border bg-white p-4 rounded-lg">
            <div class="flex justify-between">
                <div>
                    <h2 class="font-semibold text-xl">{{$post->title}}</h2>
                    <p class="opacity-85 text-sm">by {{$post->user->name}}</p>
                </div>
                <div>
                    <p class="opacity-60 text-sm">{{$post->created_at}}</p>
                </div>
            </div>
            <div>
                <p class="min-h-20">{{$post->body}}</p>
            </div>
            <div class="flex flex-row items-center gap-4 justify-between">
                <div class="flex flex-row items-center gap-4">
                    @if ($hasVoted)
                        <form action="{{route('posts.unvote', ['post' => $post])}}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                                unvote
                            </button>
                        </form>
                    @else
                    <form action="{{route('posts.vote', ['post' => $post])}}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                            vote
                        </button>
                    </form>
                    @endif
                    <span class="opacity-85">Rating: {{$post->votes}}</span>
                </div>
            </div>
        </div>
        <div class="p-4 bg-white flex flex-row justify-between">
            <div class="flex flex-col gap-4">
                <h3 class="font-semibold text-lg">Comments</h3>
                <div>
                    <form action="{{route('posts.comment', ['post' => $post])}}" method="post">
                        @csrf
                        @method('post')
                        <div class="flex gap-4">
                            <input type="text" name="body" id="body" class="w-96 h-8"/>
                            <button type="submit" class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                                Add Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @if (Auth::id() == $post->user_id)
                <div class="flex flex-row gap-4">
                    <a href="{{route('posts.edit',['post' => $post])}}">
                        <button class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">Edit post</button>
                    </a>
                    <form action="{{route('posts.destroy', ['post' => $post])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border text-gray-100 bg-red-600 px-4 py-1 rounded-md hover:bg-red-800">
                            Delete Post
                        </button>
                    </form>
                </div>
            @endif
        </div>
        <div class="flex flex-col gap-4 p-4 grow overflow-y-scroll bg-white border rounded-lg">
            @forelse ($comments as $comment)
                @if ($edit && $edit && $editCommentId == $comment->id)
                    <form action="{{route('posts.comment.update', ['post' => $post ,'commentId' => $editCommentId])}}" method="post">
                        @csrf
                        @method('put')
                        <p>{{$comment->user->name}}</p>
                        <input type="text" name="body" id="body" value="{{$comment->body}}"/>
                        <input type="submit" value="update comment" />
                    </form>
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
                                <a href="{{route('posts.comment.edit', ['post' => $post, 'commentId' => $comment->id])}}" class="underline-offset-2 underline text-sm">
                                    Edit
                                </a>
                            </div>
                            @if (Auth::id() == $post->user_id)
                            <form action="{{route('posts.comment.destroy', ['post' => $post, 'commentId' => $comment->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="underline-offset-2 underline text-sm">
                                    Delete
                                </button>
                            </form>
                            @endif
                            @endif
                        </div>
                    </div>
                @endif
                @empty
                    <p>No Comments</p>
            @endforelse
        </div>
    </div>
</x-app-layout>