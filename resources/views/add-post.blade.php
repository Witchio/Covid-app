<!-- extend from template -->
@extends('layouts.app')

<!-- redirected to here from PostController create() -->
@section('content')

<h1>hello</h1>
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

<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type=" text" name="title" placeholder="title"><br>
    <input type="text" name="content" placeholder="content"><br>
    <div>Add Image:</div>
    <input type="file" name="image"> <br>
    <input type="submit" name="submit" value="Create post">
</form>

@endsection