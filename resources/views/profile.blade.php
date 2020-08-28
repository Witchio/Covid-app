<!-- extends from template -->
@extends('layouts.app')
<!--Link to sass-->
@section('style')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection
<!-- creates section for content -->
@section('content')

<!-- <h3>Hellooo <a> {{ Auth::user()->name }}</a></h3>
<h4>Your email is <a> {{ Auth::user()->email }}</a></h4> -->
<h1 id="title">Modify personal data</h1>

<!-- Profile forms -->
<div class="profileForm">
    <form action="/profile/update" method="post">
        @csrf
        @method('PUT')
        <h4>First Name</h4>
        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ Auth::user()->first_name }}">
        <h4>Last Name</h4>
        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ Auth::user()->last_name }}">
        <!-- <input type="text" name="nationality" placeholder="Nationality" value="{{ Auth::user()->nationality }}"> -->
        <h4>Nationality</h4>
        <select class="form-control" id="select" name="nationality">
            <option selected>{{ Auth::user()->nationality }}</option>
            <option class="option" value="">...</option>
        </select>
        <h4>Birthdate</h4>
        <input type="date" class="form-control" name="birthdate" placeholder="Date of Birth" value="{{ Auth::user()->birthdate }}">
        <h4>Country</h4>
        <input type="text" class="form-control" name="country" placeholder="Country" value="{{ Auth::user()->country }}">
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>

</div>
<!--Push all countries to the select list-->
<script src="charts/countryList.js"></script>
@endsection