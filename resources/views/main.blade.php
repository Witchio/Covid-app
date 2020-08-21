<!-- extends from template-->
<section>
    <!-- This is the parent for the charts and the posts -->
    <div id="charts">
        <article>

            <canvas id="chart" width="20" height="20"></canvas>
            <!-- chart 1  -->
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
        <p>Likes : </p>
        <p>Comments : </p>
        <a href="/posts/{{$post->id}}">Read hole Post</a><br>
        <hr>
        @endforeach
    </div>

</section>

<section>
    <!-- Rss feed, squeleton for that tbd -->
</section>

<!--Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!--Label Plugin-->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.js"></script>
<!--Scripts-->
<!--<script src="{{ URL::asset('resources/js/charts/homeChart.js')}}"></script>-->
<!--<script type="text/javascript" src="{{ URL::asset('final_project/resources/js/charts/continent.js') }}"></script>-->
<script src="charts/homeChart.js"></script>
<script src="charts/continent.js"></script>