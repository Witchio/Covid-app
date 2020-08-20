<!-- extends from template-->
<section>
    <!-- This is the parent for the charts and the posts -->
    <div id="charts">
        <article>
            <!-- chart 1  -->
        </article>


        <article>
            <!-- chart2 -->
        </article>
    </div>


    <div id="posts">
        <!-- displays top posts -->
        <h2>Trending Community Posts</h2>
        @foreach($posts as $post)
        <p>Title : {{ $post->title }}</p>
        <p>Image : {{ $post->image }}</p>
        <p>Content : {{ $post->content }}</p>
        <p>Likes : {{ $post->likes }}</p>
        <p>Comments : {{ $post->comments }}</p>
        <a href="/posts/{{$post->id}}">Read hole Post</a><br>
        <hr>
        @endforeach
    </div>

</section>

<section>
    <!-- Rss feed, squeleton for that tbd -->
</section>