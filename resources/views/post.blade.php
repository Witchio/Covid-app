<!-- extend from tempate -->


<!-- individual post depending on id -->
<h2>{{ $post->title }}</h2>
<img src="" alt="">
<img src="{{asset("images/$post->image")}}" alt="post image">
<p>{{ $post->content }}</p>
<!-- only for the AUTHOR -->
<a href="/post/update/{{$post->id}}">Edit post details</a>
<p>likes</p> <!-- TODO join table query -->
<p>comments</p> <!-- TODO join table query -->