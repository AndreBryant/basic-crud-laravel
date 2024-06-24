<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{$post->title}}</h1>
    <p>By: {{$post->user->name}}</p>
    <p>{{$post->body}}</p>
    <p>Comments</p>
    <div>
        <p>Rating: {{$post->votes}}</p>
        @if ($hasVoted)
            <form action="{{route('posts.unvote', ['post' => $post])}}" method="post">
                @csrf
                @method('put')
                <input type="submit" value="unVote" />
            </form>
        @else
            <form action="{{route('posts.vote', ['post' => $post])}}" method="post">
                @csrf
                @method('put')
                <input type="submit" value="Vote" />
            </form>
        @endif
        
    </div>
    <div>
        <div>
            <form action="{{route('posts.comment', ['post' => $post])}}" method="post">
                @csrf
                @method('post')
                <input type="text" name="body" id="body" />
                <input type="submit" value="Add comment" />
            </form>
        </div>
        <div>
            @foreach ($comments as $comment)
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
                        <p>{{$comment->user->name}}</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$comment->body}}</p>
                        @if (Auth::id() == $comment->user_id)
                            <a href="{{route('posts.comment.edit', ['post' => $post, 'commentId' => $comment->id])}}">edit comment</a>
                        @endif
                    </div>
                @endif
                <div>
                    @if (Auth::id() == $comment->user_id || Auth::id() == $post->user_id)
                        <form action="{{route('posts.comment.destroy', ['post' => $post, 'commentId' => $comment->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete Comment" />
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>