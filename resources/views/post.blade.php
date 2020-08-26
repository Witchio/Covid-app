<!-- extend from tempate -->
@extends('layouts.app')

@section('content')

<!-- individual post depending on id -->
<h2>{{ $post->title }}</h2>
<img src="" alt="">
@if($post->image)
<img src="{{asset("images/$post->image")}}" alt="post image">
@endif
<p>{{ $post->content }}</p>
<!-- only for the AUTHOR -->
<a href="/post/update/{{$post->id}}">Edit post details</a>
<p>{{ $post->users_count }} likes</p> <!-- TODO join table query -->
<p>comments</p> <!-- TODO join table query -->
<ul>
    @foreach($post->comments as $comment)
    <li>{{$comment->comment}}</li>
    @endforeach
</ul>

<!-- Should be icon probably -->
<button id="report">Report</button>
<!-- If user that created the post or admin wants to permanently delete it-->
<button id="delete">Delete</button>
<a href="/post/report/{{$post->id}}">report</a>


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
                    alert('AJAX ERROR. Pleace contact administrator');
                }
            });
        });
    });
</script>
@endsection