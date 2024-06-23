<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>
    <a href="{{route('posts.create')}}">Add a post</a>
        @foreach ($posts as $post)
            <h3>{{$post->title}}</h3>
            <p> {{$post->body}}</p>
            <span>{{$post->likes}}</span>
        @endforeach
    </div>
</body>
</html>