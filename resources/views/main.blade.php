<!-- extends from template-->
@extends('layouts.app')

@section('content')

<section>
    <!-- This is the parent for the charts and the posts -->
    <div id="charts">
        <!--To reshaphe charts modify the canvas and the container both or won't work-->
        <article style="max-height:1000px;max-width:1000px">

            <!-- chart 1  -->
            <canvas id="luxemburg" style="max-height:1000px;max-width:1000px"></canvas>
        </article>


        <article>
            <!-- chart2 -->
            <canvas id="continent"></canvas>
        </article>
    </div>


    <div id="posts">
        <!-- displays top posts -->
        <h2>Trending Community Posts</h2>
        @foreach($posts as $post)
        <p>Title : {{ $post->title }}</p>
        <p>Image : </p>
        <img src="{{ asset("images/$post->image")}}" alt="">
        <p>Content : {{ $post->content }}</p>
        <p>{{ $post->users_count }} likes </p>
        <p>{{ $post->comments_count }} Comments :</p>
        <ul>
            @foreach($post->comments as $comment)
            <li>{{$comment->comment}}</li>
            @endforeach
        </ul>
        <a href="/posts/{{$post->id}}">Go to Post</a><br>
        <hr>
        @endforeach
    </div>

</section>

<section>
    <!-- Rss feed, squeleton for that tbd -->
</section>

@endsection

<!--Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!--Label Plugin-->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.js"></script>
<!--Scripts-->
<script src="charts/luxCases.js"></script>
<script src="charts/continent.js"></script>