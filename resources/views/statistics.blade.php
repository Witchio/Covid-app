<!--Link to sass-->
@section('style')
<link href="{{ asset('css/stats.css') }}" rel="stylesheet">
@endsection

<!-- extends from template-->
@extends('layouts.app')
@section('content')
<h1>Covid-stats</h1>

<section id="chart-data">


    <!--To reshaphe charts modify the canvas and the container both or won't work-->
    <article id="canvas">

        <select id="select" class="form-control">
            <option selected>Choose country</option>
            <option class="option" value="">...</option>
        </select>
        <!-- chart 1 : Luxemburg cases -->
        <canvas id="luxemburg"></canvas>
        <!-- chart 2 : Luxemburg deaths -->
        <canvas id="luxDeaths"></canvas>
        <!-- Selected country -->
        <canvas id="country"></canvas>
        <canvas id="deaths"></canvas>

    </article>



    <!-- Global datas -->
    <article id="worldDataBox">
        <h1>Corona Facts</h1>

        <h2 class="dataTitle">New Confirmed</h2>
        <hr>
        <span class="boxData orange" id="nc"></span>
        <h2 class="dataTitle">Total Confirmed</h2>
        <hr>
        <span class="boxData orange" id="tc"></span>
        <h2 class="dataTitle">New Deaths</h2>
        <hr>
        <span class="boxData red" id="nd"></span>
        <h2 class="dataTitle ">Total Deaths</h2>
        <hr>
        <span class="boxData red" id="td"></span>
        <h2 class="dataTitle">New Recovered</h2>
        <hr>
        <span class="boxData green" id="nr"></span>
        <h2 class="dataTitle">Total Recovered</h2>
        <hr>
        <span class="boxData green" id="tr"></span>
</section>

</article>
<br>
<br>
<article class="worldTable">
    <!-- Data for all the countries-->
    <table data-toggle="table" id="world" class="table table-info table-hover table-bordered table-inverse table-striped">
        <thead class="thead-dark">
            <th scope="col">Country</th>
            <th scope="col">New Confirmed</th>
            <th scope="col">Total Confirmed</th>
            <th scope="col">New Deaths</th>
            <th scope="col">Total Deaths</th>
            <th scope="col">New Recovered</th>
            <th scope="col">Total Recovered</th>
        </thead>
        <tbody id="row">
            <th class="country"></th>
            <td class="ncw"></td>
            <td class="tcw"></td>
            <td class="ndw"></td>
            <td class="tdw"></td>
            <td class="nrw"></td>
            <td class="trw"></td>
        </tbody>
    </table>
</article>

@endsection


@section('js-resources')
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
@endsection