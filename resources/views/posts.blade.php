<!-- extends from template -->
@extends('layouts.app')

@section('meta-tags')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- Looop to display posts -->
@section('content')
<h1>Posts</h1>

<!-- when clicked goes to PostController create() -->
@if(Auth::user() !== null)
<a href="{{ route('post.create') }}"><button id="create">Create post</button></a>
@endif

<!-- Looop to display posts, getting the data from PostController-->

@foreach($posts as $post)
<article>

    <h2>{{ $post->title }}</h2>
    @if($post->image)
    <img src="{{asset("images/$post->image")}}" alt="post image">
    @endif
    <p>{{ @substr($post->content,0,100 ) }} ...</p>
    <a href="/posts/{{$post->id}}">See more</a>
    <div>{{ $post->users_count }} likes</div>
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