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
        <!-- im guessing it will be a loop to create articles of top posts -->
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
<script src="{{ URL::asset('final_project/resources/js/charts/continent.js')}}"></script>
<!--<script src="./final_project/resources/js/charts/homeChart.js"></script>-->
<!--<script src="final_project/resources/js/charts/homeChart.js"></script>-->