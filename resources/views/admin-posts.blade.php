<!-- extend from tempate -->
@extends('layouts.app')
<!--Link to sass-->
@section('style')
<link href="{{ asset('css/admin-posts.css') }}" rel="stylesheet">
@endsection
<!-- section('content') -->
@section('content')

<!-- Only show if user is logged in-->
@if (Auth::user())

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- for the USERS -->
@if (Auth::user()->role=="user")
@auth
<p>Access Permissions Insufficient</p>
@endauth
@endif

<!-- only for the ADMINS -->
@if (Auth::user()->role=="admin")
@auth

<body>
    <section id="posts">
        <h1>Reported posts</h1>
        @foreach($posts as $post)

        <article>

            @if($post->image)
            <div class="article-image" style='background-image: url({{asset("images/$post->image")}})'>
            </div>
            @endif

            <div class="article-body">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>

                <button class="delete-btn btn btn-danger" value="{{$post->id}}">
                    <a href="/admin/posts/delete/{{$posts[0]->id}}">Delete post</a>
                </button>
                <button class="restore-btn btn btn-info" value="{{$post->id}}">Restore post</button>
                <hr>
            </div>
        </article>
        @endforeach
    </section>

    <!-- Ajax call to delete post -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('.restore-btn').click(function(e) {
                e.preventDefault();
                let route = '/admin/posts/restore/' + $(this).val();

                $.ajax({
                    url: route,
                    type: 'put',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        alert('Post restored!');
                    },
                    error: function(err) {
                        alert('AJAX ERROR. Please contact administrator');
                    }
                })
            })
        })
    </script>
</body>

</html>

@endauth
@endif
@endif
<!-- endsection -->
@endsection