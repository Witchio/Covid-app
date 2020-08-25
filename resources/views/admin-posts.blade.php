<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Reported posts</h1>
    @foreach($posts as $post)
    <article>

        <h2>{{ $post->title }}</h2>
        <img src="{{asset("images/$post->image")}}" alt="post image">
        <p>{{ @substr($post->content,0,100 ) }} ...</p>
        <a href="/posts/{{$post->id}}">See more</a>
        <p>likes</p> <!-- TODO join table query -->
        <p>comments</p> <!-- TODO join table query -->
        <form action="posts/delete/{{$post->id}}" method="post">
            @csrf
            <input type="submit" value="Delete post">
        </form>
    </article>
    @endforeach
</body>

</html>