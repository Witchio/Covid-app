<!-- extend from tempate -->
@extends('layouts.app')

@section('style')
<link href="{{ asset('css/edit-post.css') }}" rel="stylesheet">
@endsection

<!-- section('content') -->
@section('content')

<!-- Only show if user is logged in-->
@if (Auth::user())
<!-- only for the AUTHOR -->
@if ($post->user_id==Auth::user()->id)
@auth

<!-- Output if errors in the form -->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1>Edit Post</h1>

<!-- form -->
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="editTitle">Title:</label><br>
    <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}"><br>
    <label for="editContent">Content:</label><br>
    <!-- <input type="text" name="content" id="" value="{{$post->content}}"> -->
    <textarea class="form-control" name="content" id="editContent" cols="30" rows="10">{{$post->content}}</textarea><br>
    <p>Current image: </p>
    <p>
        <img src="{{asset("images/$post->image")}}" alt="">
    </p> <br>
    <p>
        (Optional) Update image:
        <input type="file" name="image"><br><br>
    </p>
    <input type="submit" class="btn btn-primary" value="Post Update">
    <!--Not easy to create a cancel button inside the form, I used this to do it : https://stackoverflow.com/questions/18407832/how-to-create-a-html-cancel-button-that-redirects-to-a-url#:~:text=First%20of%20all%2C%20there%20is,expected%2C%20to%20designate%20JavaScript%20code.-->
    <button type="cancel" class="btn btn-dark" onclick="window.location='/posts/{{$post->id}}';return false;">Cancel</button>
</form>

@endauth
@endif
@endif
<!-- endsection -->
@endsection