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
    <button class="like-btn" value="{{$post->id}}">Me likey</button>
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

    @section('js-resources')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('.like-btn').click(function(e) {
                let route = '/post/like/' + $(this).val();
                console.log('Route: ' + route);
                $.ajax({
                    url: route,
                    type: 'put',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        console.log(result.message);
                        $('.content').load(document.URL + ' .content');
                    },
                    error: function(err) {
                        // If ajax errors happens
                        alert('AJAX ERROR. Pleace contact administrator');
                    }
                });
            });
        });
    </script>
    @endsection