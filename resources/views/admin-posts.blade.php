<!-- extend from tempate -->

@extends('layouts.app')
<!-- section('content') -->
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>Reported posts</h1>
    @foreach($posts as $post)
    <article>

        <h2>{{ $post->title }}</h2>
        @if($post->image)
        <img src="{{asset("images/$post->image")}}" alt="post image">
        @endif
        <p>{{ $post->content }}</p>

        <!--Replacing form with ajax-->
        <!-- <form action="posts/delete/{{$post->id}}" method="post">
            @csrf
            <input type="submit" value="Delete post">
        </form> -->


        <button class="delete-btn" value="{{$post->id}}">Delete post</button>
        <button class="restore-btn" value="{{$post->id}}">Restore post</button>
        <hr>
    </article>
    @endforeach

    <!-- Ajax call to delete post -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('.delete-btn').click(function(e) {
                e.preventDefault();
                let route = '/admin/posts/delete/' + $(this).val();

                console.log('Route: ' + route);
                $.ajax({
                    url: route,
                    type: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        alert('Ajax success');
                    },
                    error: function(err) {
                        alert('AJAX ERROR. Please contact administrator');
                    }
                })
            })
        })
        $(function() {
            $('.restore-btn').click(function(e) {
                e.preventDefault();
                let route = '/admin/posts/restore/' + $(this).val();

                console.log('Route: ' + route);
                $.ajax({
                    url: route,
                    type: 'put',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        alert('Ajax success');
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

<!-- endsection -->

@endsection
