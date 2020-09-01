<!-- extend from tempate -->
@extends('layouts.app')

@section('style')
<link href="{{ asset('css/reported-post.css') }}" rel="stylesheet">
@endsection

<!-- section('content') -->
@section('content')

<section class="notification">
    <p>Thank you for flagging content that might go against our community guidelines.</p>
    <p>This post has now been hidden and sent to the site moderators for consideration.</p>
    <p>Click here to return to the main posts page : <a href="/posts">Community Posts</a></p>
</section>

<!-- endsection -->
@endsection