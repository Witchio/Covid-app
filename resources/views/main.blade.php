<!-- extends from template-->
@extends('layouts.app')

@section('content')

<section>
    <!-- This is the parent for the charts and the posts -->
    <div id="charts">
        <!--To reshaphe charts modify the canvas and the container both or won't work-->
        <article style="max-height:1000px;max-width:1000px">

            <!-- Luxemburg cases  -->
            <canvas id="luxemburg" style="max-height:1000px;max-width:1000px"></canvas>
        </article>


        <article>
            <!-- Continent Chart -->
            <!--Desktop version -->
            <canvas id="continent"></canvas>
            <!--Mobile version -->
            <canvas id="continentMobile"></canvas>
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
    <!-- Link for the xml file: https://rss.app/feeds/mPa6EvYZGT7E0ee4.xml - Font: independent.co.uk -->
        <rssapp-list id="mPa6EvYZGT7E0ee4"></rssapp-list>
        <script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
</section>

@endsection

<!--Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!--Label Plugin-->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.js"></script>
<!--Scripts-->
<script src="charts/luxCases.js"></script>
<script src="charts/continentDesktop.js"></script>
<script src="charts/continentMobile.js"></script>