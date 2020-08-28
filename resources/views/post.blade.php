<!-- extend from tempate -->
@extends('layouts.app')

@section('style')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@endsection


@section('content')

<!-- individual post depending on id -->
<h1>{{ $posts[0]->title }}</h1>
<!-- <h3>{{$posts[0]->name}}</h3> -->
<section class="maincontainer">
    <img src="" alt="">
    @if($posts[0]->image)
    <img src="{{asset("images/$img")}}" alt="post image">
    @endif

    <p>{{ $posts[0]->content }}</p>


    <section class="authoraccess">
        <!-- {{$posts[0]->user_id}} -->
        <!-- Only show if user is logged in-->
        @if (Auth::user())
        <!-- only for the AUTHOR -->
        @auth
        @if ($posts[0]->user_id==Auth::user()->id)
        <br>
        <div id="editfakebtn">
            <a href="/post/update/{{$posts[0]->id}}"><button id="editbg">Edit post details</button></a>
        </div>
        @endif
        @endauth
        @endif

        @if(Auth::user() !== null)
        @if($posts[0]->user_id==Auth::user()->id ||Auth::user()->role == "admin")
        <!-- If user that created the post or admin wants to permanently delete it-->
        <div>
            <a href="/post/delete/{{$posts[0]->id}}"><button id="delete">Delete Post</button></a>
        </div>
        @endif
        @endif
    </section>

    <section class="maininfo">
        <span>{{ $posts[0]->users_count }} likes</span>

        <!-- Only show if user is logged is-->
        @if (Route::has('login'))
        @auth
        <button class="like-btn" @if ($liked) style="display: none;" @endif value="{{$posts[0]->id}}" onclick="toggleLike()"><i class="far fa-thumbs-up"></i></button>
        <button class="like-btn" @if (!$liked) style="display: none;" @endif value="{{$posts[0]->id}}" onclick="toggleLike()"><i class="fas fa-thumbs-up"></i></button>
        <!-- IF user has not reported this post before -->
        @if(!$reported)
        <!-- IF user is not the post author -->
        @if($posts[0]->user_id!=Auth::user()->id)
        <button id="report"><a href="/post/report/{{$posts[0]->id}}"><i class="far fa-flag"></i></a></button>
        @endif
        @endif



        @endauth
        @endif
    </section>
</section>


<br><br>
<section class="commentscontainer">
    <h5>----------Comments ({{ $posts[0]->comments_count }})----------</h5>
    @if($posts[0]->comments_count > 0)
    <ul>
        @foreach($posts as $post)
        <li><b>{{$post->name}} :</b><br> {{$post->comment}}</li>
        @endforeach
    </ul>
    @endif


    <!-- Comment post-->
    @if (Route::has('login'))
    @auth
    <form action="/posts/comment/{{ $posts[0]->id}}" method="post">
        @csrf
        <input type="text" name="comment" class="newcomment">
        <input type="submit" value="Comment">
    </form>
    @endauth
    @endif
</section>

@endsection



@section('js-resources')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="{{ asset('js/post.js') }}"></script>

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