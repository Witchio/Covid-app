<!-- extends from template -->
@extends('layouts.app')

@section('meta-tags')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- Looop to display posts -->
@section('content')
<h1>Posts</h1>
@foreach($posts as $post)
<article>

    <h2>{{ $post->title }}</h2>
    <img src="{{asset("images/$post->image")}}" alt="post image">
    <p>{{ $post->content }}</p>
    <a href="/posts/{{$post->id}}">See more</a>
    <div>{{ $post->users_count }} likes</div>
    <br>
    <div>{{ $post->users_reports_count }} reports</div>
    <div>Me reporty</div><br>
    <p>Comments :</p>
    <ul>
        @foreach($post->comments as $comment)
        <li>{{$comment->comment}}</li>
        @endforeach
    </ul>
    <form action="/posts/edit/{{ $post->id}}" method="post">
        @csrf
        <input type="text" name="comment">
        <input type="submit" value="Comment">
    </form>
    @endforeach
    @endsection