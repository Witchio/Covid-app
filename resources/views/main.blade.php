<!-- extends from template-->
@extends('layouts.app')

@section('style')
<link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
@endsection

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


    <h1>Trending Community Posts</h1>
    <section id="posts">
        <!-- displays top posts -->
        @foreach($posts as $post)
        <article>
            <img src="{{ asset("images/$post->image")}}" alt="">
            <div class="content">
                <h3> {{ $post->title }}</h3>
                <p>Content : {{ @substr($post->content,0,150 ) }}... <a href="/posts/{{$post->id}}">See more</a></p>
                <div class="like-comment">
                    <p>{{ $post->users_count }} <i class="fas fa-thumbs-up"></i></p>
                    <p>{{ $post->comments_count }} <i class="fas fa-comment"></i></p>
                </div>
            </div>
        </article>
        @endforeach
        <!--  <ul>
            @foreach($post->comments as $comment)
            <li>{{$comment->comment}}</li>
            @endforeach
        </ul> -->
    </section>

</section>

<section id="rss">
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
