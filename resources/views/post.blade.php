<!-- extend from tempate -->
@extends('layouts.app')

@section('content')

<!-- individual post depending on id -->
<h2>{{ $posts[0]->title }}</h2>
<img src="" alt="">
@if($posts[0]->image)
<img src="{{asset("images/$img")}}" alt="post image">
@endif
<p>{{ $posts[0]->content }}</p>


<!-- Only show if user is logged in-->
@if (Auth::user())
<!-- only for the AUTHOR -->
@if ($posts[0]->user_id==Auth::user()->id)
@auth
<p>
    <a href="/post/update/{{$posts[0]->id}}">Edit post details</a>
</p>
@endauth
@endif
@endif
<br>

<div>{{ $posts[0]->users_count }} likes</div>

<!-- Only show if user is logged is-->
@if (Route::has('login'))
@auth

<!-- Should be icon probably -->
<button class="like-btn" value="{{$posts[0]->id}}">LIKE icon</button>
<!-- IF user has not reported this post before -->
@if(!$reported)
<!-- IF user is not the post author -->
@if($posts[0]->user_id!=Auth::user()->id)
<a href="/post/report/{{$posts[0]->id}}"><button id="report">Report</button></a>
@endif
@endif
<!-- If user that created the post or admin wants to permanently delete it-->
<a href="/post/delete/{{$posts[0]->id}}"><button id="report">Delete</button></a>

@endauth
@endif


<br><br>
<p>-----Comments ({{ $posts[0]->comments_count }})-----</p>
<ul>
    @foreach($posts as $post)
    <li>{{$post->comment}}</li>
    <li>{{$post->name}}</li>
    @endforeach
</ul>


<!-- Comment post-->
@if (Route::has('login'))
@auth
<form action="/posts/comment/{{ $posts[0]->id}}" method="post">
    @csrf
    <input type="text" name="comment">
    <input type="submit" value="Comment">
</form>
@endauth
@endif

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
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    console.log(result.message);
                    $('.content').load(document.URL + ' .content');
                },
                error: function(err) {
                    // If ajax errors happens
                    alert('Please Log In or Register to LIKE posts : AJAX ERROR.');
                }
            });
        });
    });
</script>
@endsection