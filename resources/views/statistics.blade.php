<!--Link to sass-->
@section('style')
<link href="{{ asset('css/stats.css') }}" rel="stylesheet">
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stats</title>
</head>

<body>
    <!-- extends from template-->
    @extends('layouts.app')

    @section('content')

    <section>


        <!--To reshaphe charts modify the canvas and the container both or won't work-->
        <article>
            <select id="select">
                <option selected>Choose country</option>
                <option class="option" value="">...</option>
            </select>

            <!-- chart 1 : Luxemburg cases -->
            <canvas id="luxemburg" style="max-height:1000px;max-width:1000px"></canvas>
            <!-- chart 2 : Luxemburg deaths -->
            <canvas id="luxDeaths" style="max-height:1000px;max-width:1000px"></canvas>
            <!-- Selected country -->
            <canvas id="country"></canvas>
            <canvas id="deaths"></canvas>

        </article>


        <!-- Global datas -->
        <article id="worldDataBox">
            <h1>Corona Facts</h1>
            <h1>NewConfirmed</>
                <span id="nc"></span>
                <h1>TotalConfirmed</h1>
                <span id="tc"></span>
                <h1>NewDeaths</h1>
                <span id="nd"></span>
                <h1>TotalDeaths</h1>
                <span id="td"></span>
                <h1>NewRecovered</h1>
                <span id="nr"></span>
                <h1>TotalRecovered</h1>
                <span id="tr"></span>


        </article>
        <hr>
        <hr>
        <article>
            <!-- Data for all the countries-->
            <table data-toggle="table" id="world" class="table table-info table-hover table-bordered table-inverse table-striped">
                <thead class="thead-dark">
                    <th scope="col">Country</th>
                    <th scope="col">NewConfirmed</th>
                    <th scope="col">TotalConfirmed</th>
                    <th scope="col">NewDeaths</th>
                    <th scope="col">TotalDeaths</th>
                    <th scope="col">NewRecovered</th>
                    <th scope="col">TotalRecovered</th>
                </thead>
                <tbody id="row">
                    <th class="country" scope="row"></th>
                    <td class="ncw"></td>
                    <td class="tcw"></td>
                    <td class="ndw"></td>
                    <td class="tdw"></td>
                    <td class="nrw"></td>
                    <td class="trw"></td>
                </tbody>
            </table>
        </article>




</body>


<!--Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!--Label Plugin-->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.js"></script>

<!--Local Scripts-->
<!--These datas display when opening page-->
<script src="charts/luxCases.js"></script>
<script src="charts/luxDeaths.js"></script>
<!--Push all countries to the select list-->
<script src="charts/countryList.js"></script>
<script src="charts/countryCases.js"></script>
<!--- Script to call the 2 upper graphs when select is changed-->
<script src="charts/countryDeaths.js"></script>
<script src="charts/charts.js"></script>
<!--Tables-->
<script src="charts/global.js"></script>
<script src="charts/world.js"></script>





</html>
@endsection