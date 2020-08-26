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

                <!-- chart 1 : Luxemburg -->
                <canvas id="luxemburg" style="max-height:1000px;max-width:1000px"></canvas>
                <!-- Selected country -->
                <canvas id="country"></canvas>
                <select id="select">
                    <option class="option" value="">...</option>
                </select>
                <script>

                </script>
            </article>


            <article>
                <!-- Global data table -->
                <table>
                    <table id="global">
                        <thead>
                            <th>NewConfirmed</th>
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
                <!-- Data for all the countries-->
                <table id="world">
                    <thead>
                        <th>Country</th>
                        <th>NewConfirmed</th>
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
<script src="charts/homeChart.js"></script>
<script src="charts/countryList.js"></script>
<script src="charts/country.js"></script>
<script src="charts/global.js"></script>
<script src="charts/world.js"></script>

</html>
@endsection