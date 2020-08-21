<!-- extends from template -->

<!-- Looop to display posts -->

<h1>Posts</h1>
@foreach($posts as $post)
<article>

</article>

<h2>{{ $post->title }}</h2>
<p>{{ $post->content }}</p>
<img src="{{asset("images/$post->image")}}" alt="post image">
<a href="/posts/{{$post->id}}">See more</a>
<p>likes</p> <!-- TODO join table query -->
<p>Comments :</p>
<ul>
    @foreach($post->comments as $comment)
    <li>{{$comment->comment}}</li>
    @endforeach
</ul>
@endforeach