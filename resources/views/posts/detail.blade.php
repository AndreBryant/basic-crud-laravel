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
    <ul>
        <li>Comments here</li>
    </ul>
</body>
</html>