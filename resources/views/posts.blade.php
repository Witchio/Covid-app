<!-- extends from template -->
@extends('layouts.app')

@section('meta-tags')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('style')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
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
<p>{{ $post->comments_count }} comments</p>

@endforeach

@endsection