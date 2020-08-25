<!-- extends from template -->
@extends('layouts.app')

<!-- Looop to display posts -->
@section('content')
<h1>Posts</h1>

<!-- when clicked goes to PostController create() -->
<button id="create">Create post</button>
<a href="{{ route('post.create') }}">create link</a>


<!-- Looop to display posts, getting the data from PostController-->

@foreach($posts as $post)
<article>

    <h2>{{ $post->title }}</h2>
    @if($post->image)
    <img src="{{asset("images/$post->image")}}" alt="post image">
    @endif
    <p>{{ @substr($post->content,0,100 ) }} ...</p>
    <a href="/posts/{{$post->id}}">See more</a>
    <p>likes</p> <!-- TODO join table query -->
</article>
<p>Comments :</p>
<ul>
    @foreach($post->comments as $comment)
    <li>{{$comment->comment}}</li>
    @endforeach
    <!-- Only show if user is logged is-->
    @if (Route::has('login'))
    @auth
    <form action="/posts/edit/{{ $post->id}}" method="post">
        @csrf
        <input type="text" name="comment">
        <input type="submit" value="Comment">
    </form>
    @endauth
    @endif


</ul>
@endforeach

@endsection

<!-- scripts, can probably extend from template, but for now here -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- My script -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#create").click(function() {
        $.ajax({
            type: 'get',
            url: "{{ route('post.create') }}"
            //url: "./create",
        });
    })
</script>
