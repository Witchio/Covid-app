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
<h1>Community Posts</h1>


<!-- Looop to display posts, getting the data from PostController-->

<section id="posts">
    <!-- when clicked goes to PostController create() -->
    @if(Auth::user() !== null)
    <div id="create">
        <a href="{{ route('post.create') }}"><button>Create post</button></a>
    </div>
    @endif
    @foreach($posts as $post)
    <article>

        @if($post->image)
        <div class="article-image" style='background-image: url({{asset("images/$post->image")}})'>
        </div>
        @endif
        <div class="article-body">

            <h2><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h2>

            <p>
                {{ @substr($post->content,0,300 ) }}...
                <a href="/posts/{{$post->id}}">See more</a>
            </p>
            <div class="like-comment">
                <div class="post-details">{{ $post->users_count }} <i class="far fa-thumbs-up"></i></div>
                <div class="post-details">{{ $post->comments_count }} <i class="far fa-comments"></i></div>
            </div>
        </div>

    </article>
    @endforeach
</section>

@endsection