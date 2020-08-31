<!-- extend from tempate -->
@extends('layouts.app')

@section('style')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
@endsection


@section('content')

<!-- individual post depending on id -->
<h2>{{ $posts[0]->title }}</h2>


<!-- <h3>{{$posts[0]->name}}</h3> -->
<section class="maincontainer">
    <em>
        <h5>posted by <b>{{$user->name}}</b>, on {{@substr($user->created_at, 0, 16)}}</h5>
    </em>
    <section class="articlebody">

        @if($posts[0]->image)
        <!-- <img src="{{asset("images/$img")}}" alt="post image"> -->
        <div class="article-image" style='background-image: url({{asset("images/$img")}})'>
        </div>
        @endif

        <section class="articlecontent">
            <p>{{ $posts[0]->content }}</p>

            <section class="articlefooter">
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
                    <a href="/post/report/{{$posts[0]->id}}"><button id="report"><i class="far fa-flag"></i></button></a>
                    @endif
                    @endif
                    @endauth
                    @endif

                </section>

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
                    @if($posts[0]->user_id==Auth::user()->id || Auth::user()->role == "admin")
                    <!-- If user that created the post or admin wants to permanently delete it-->
                    <div>
                        <a href="/post/delete/{{$posts[0]->id}}"><button id="delete">Delete Post</button></a>
                    </div>
                    @endif
                    @endif
                </section>
            </section>
        </section>
    </section>
</section>
@if($reported)
<p class="reportedmsg">
    <i class="fas fa-exclamation-triangle"></i> You have reported this post</p>
@endif

<br><br>
<section class="commentscontainer">
    <h5>----------Comments ({{ $posts[0]->comments_count }})----------</h5>
    @if($posts[0]->comments_count > 0)
    <ul>
        @foreach($posts as $post)
        <li id='username'>
            <div>{{$post->name}} :</div>{{$post->comment}}
        </li>
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
            $.ajax({
                url: route,
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
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