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
<p>likes</p> <!-- TODO join table query -->
<p>comments</p> <!-- TODO join table query -->
<ul>
    @foreach($post->comments as $comment)
    <li>{{$comment->comment}}</li>
    @endforeach
</ul>

<!-- Should be icon probably -->
@if(!$reported)
<a href="/post/report/{{$post->id}}"><button id="report">Report</button></a>
@endif

<!-- If user that created the post or admin wants to permanently delete it-->
<a href="/post/delete/{{$post->id}}"><button id="report">Delete</button></a>



@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- My script -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#report").click(function() {
        $.ajax({
            type: 'post',
            url: "{{ route('post.report', ['id' => $post->id]) }}",
        });
        console.log('sadasd')
    })
</script>
