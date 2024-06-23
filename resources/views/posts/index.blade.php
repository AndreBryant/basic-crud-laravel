<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>
    @if (session()->has('success'))
        <p>
            {{session('success')}}
        </p>
    @endif
    <a href="{{route('posts.create')}}">Add a post</a>
        @foreach ($posts as $post)
            <h3>
                {{$post->title}}
                @if (Auth::id() == $post->user_id)
                    <a href="{{route('posts.edit',['post' => $post])}}">Edit post</a>
                
                    <form action="{{route('posts.destroy', ['post' => $post])}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete Post" />
                    </form>
                @endif
            </h3>
            <p>By: {{$post->user->name}} (change this to name later haha)</p>
            <p> {{$post->body}}</p>
            <span>Rating:{{$post->votes}}</span>
        @endforeach
    </div>
</body>
</html>