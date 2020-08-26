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
                <!-- chart3 : Global data table -->
<<<<<<< Updated upstream
                <table>
                    <thead>
                        <th id="">NewConfirmed</th>
=======
                <table id="global">
                    <thead>
                        <th>NewConfirmed</th>
>>>>>>> Stashed changes
                        <th>TotalConfirmed</th>
                        <th>NewDeaths</th>
                        <th>TotalDeaths</th>
                        <th>NewRecovered</th>
                        <th>TotalRecovered</th>
                    </thead>
                    <tbody id="table">
                        <td id="nc"></td>
                        <td id="tc"></td>
                        <td id="nd"></td>
                        <td id="td"></td>
                        <td id="nr"></td>
                        <td id="tr"></td>
                    </tbody>
                </table>
            </article>
            <hr>
            <hr>
            <article>
                <!-- chart4 : Data for all the countries-->
                <table id="world">
                    <thead>
                        <th onclick="byCountry()">Country</th>
                        <th onclick="byNewCases()">NewConfirmed</th>
                        <th>TotalConfirmed</th>
                        <th>NewDeaths</th>
                        <th>TotalDeaths</th>
                        <th>NewRecovered</th>
                        <th>TotalRecovered</th>
                    </thead>
                    <tbody id="row">
                        <td class="country"></td>
                        <td class="ncw"></td>
                        <td class="tcw"></td>
                        <td class="ndw"></td>
                        <td class="tdw"></td>
                        <td class="nrw"></td>
                        <td class="trw"></td>
                    </tbody>
                </table>
            </article>

        </div>
</body>


<!--Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!--Label Plugin-->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.js"></script>
<!--Scripts-->
<!-- <script src="charts/homeChart.js"></script>
<script src="charts/continent.js"></script> -->
<<<<<<< Updated upstream
<script src="charts/countryList.js"></script>
<script src="charts/country.js"></script>
<script src="charts/global.js"></script>
<script src="charts/world.js"></script>
=======
<script src="charts/global.js"></script>
>>>>>>> Stashed changes

</html>
@endsection