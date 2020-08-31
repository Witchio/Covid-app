<!-- extend from template -->
@extends('layouts.app')

@section('style')
<link href="{{ asset('css/add-post.css') }}" rel="stylesheet">
@endsection
<!-- redirected to here from PostController create() -->
@section('content')
<style>
    .footer-distributed {
        position: relative;
        bottom: 0;
    }
</style>
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

<h1>Create Post</h1>

<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input id="title" class="form-control" type=" text" name="title" placeholder="title">
    </div>
    <label for="content">Content:</label>
    <textarea class="form-control" name="content" placeholder="content"></textarea>
    <br>
    <div class="form-group">
        <div>Add Image:</div>
        <input type="file" name="image"> <br>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Create post">
    <!--Not easy to create a cancel button inside the form, I used this to do it : https://stackoverflow.com/questions/18407832/how-to-create-a-html-cancel-button-that-redirects-to-a-url#:~:text=First%20of%20all%2C%20there%20is,expected%2C%20to%20designate%20JavaScript%20code.-->
    <button type="cancel" class="btn btn-dark" onclick="window.location='../posts';return false;">Cancel</button>
</form>

@endsection