<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- extends from template-->
    @extends('layouts.app')

    @section('content')

    <section>
        <!-- This is the parent for the charts and the posts -->
        <div id="charts">
            <!--To reshaphe charts modify the canvas and the container both or won't work-->
            <article style="max-height:1000px;max-width:1000px">

                <canvas id="chart" style="max-height:1000px;max-width:1000px"></canvas>
                <!-- chart 1 : Luxemburg -->
            </article>


            <article>
                <!-- chart2 : Per continent -->
                <canvas id="continent"></canvas>
            </article>

            <article>
                <!-- chart3 : Global data -->
                <canvas id="global"></canvas>
            </article>
        </div>
</body>


@endsection
<!--Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!--Label Plugin-->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.js"></script>
<!--Scripts-->
<!-- <script src="charts/homeChart.js"></script>
<script src="charts/continent.js"></script> -->
<script src="charts/global.js"></script>

</html>