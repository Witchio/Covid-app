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
<button id="report">Report</button>
<!-- If user that created the post or admin wants to permanently delete it-->
<button id="delete">Delete</button>
<a href="/post/report/{{$post->id}}">report</a>


@endsection