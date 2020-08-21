<!-- extends from template -->
<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- should extend from the layout as well -->

<h1>Posts</h1>

<!-- when clicked goes to PostController create() -->
<button id="create">Create post</button>
<a href="/posts/create">create link</a>


<!-- Looop to display posts, getting the data from PostController-->
@foreach($posts as $post)
<article>
    <h2>{{ $post->title }}</h2>
    <img src="{{asset("images/$post->image")}}" alt="post image">
    <p>{{ @substr($post->content,0,100 ) }} ...</p>
    <a href="./{{$post->id}}">See more</a>
    <p>likes</p> <!-- TODO join table query -->
    <p>comments</p> <!-- TODO join table query -->
    @endforeach
</article>

<!-- scripts, can probably extend from template, but for now here -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- My script -->
<script>
    $("#create").click(function() {
        $.ajax({
            type: 'get',
            url: "{{ route('post.create') }}"
            //url: "./create",
        });
    })
    /* $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); */
</script>
