<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit a Post</title>
</head>
<body>
    <h1>Edit A Post</h1>
    @if ($errors->any())
        <p>DEBUG</p>
        <p>{{$errors}}</p>        
    @endif
        <form action="{{route('posts.update', ['post' => $post])}}" method="POST">
            @csrf
            @method('put')
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{$post->title}}"/>
            </div>
            <div>
                <label for="Body">Body:</label>
                <input type="text" name="body" id="body" value="{{$post->body}}"/>
            </div>
            <input type="submit" value="Edit Post" />
        </form>
</body>
</html>