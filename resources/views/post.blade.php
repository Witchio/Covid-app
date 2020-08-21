<!-- extend from tempate -->

<h2>{{ $post->title }}</h2>
<img src="" alt="">
<img src="{{asset("images/$post->image")}}" alt="post image">
<p>{{ $post->content }}</p>
<p>likes</p> <!-- TODO join table query -->
<p>comments</p> <!-- TODO join table query -->
