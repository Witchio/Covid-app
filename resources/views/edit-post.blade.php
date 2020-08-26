<!-- extend from tempate -->
@extends('layouts.app')

<!-- section('content') -->
@section('content')


<!-- Only show if user is logged in-->
@if (Auth::user())
<!-- only for the AUTHOR -->
@if ($post->user_id==Auth::user()->id)
@auth

<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="editTitle">Title:</label><br>
    <input type="text" name="title" id="editTitle" value="{{$post->title}}"><br>
    <label for="editContent">Content:</label><br>
    <!-- <input type="text" name="content" id="" value="{{$post->content}}"> -->
    <textarea name="content" id="editContent" cols="30" rows="10">{{$post->content}}</textarea>
    <p>Current image: </p>
    <img src="{{asset("images/$post->image")}}" alt="">
    <span>(Optional) Update image: </span>
    <input type="file" name="image"><br><br>
    <input type="submit" value="Post Update">
</form>

@endauth
@endif
@endif
<!-- endsection -->
@endsection