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
<h1>Modify personal data</h1>

<!-- Profile forms -->
<div class="profileForm">
    <form action="/profile/update" method="post">
        @csrf
        @method('PUT')
        <label for="">First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ Auth::user()->first_name }}">
        <label for="">Last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ Auth::user()->last_name }}">
        <!-- <input type="text" name="nationality" placeholder="Nationality" value="{{ Auth::user()->nationality }}"> -->
        <label for="">Nationality</label>
        <select class="form-control" id="select" name="nationality">
            <option selected>{{ Auth::user()->nationality }}</option>
            <option class="option" value="">...</option>
        </select>
        <label for="">Birthdate</label>
        <input type="date" class="form-control" name="birthdate" placeholder="Date of Birth" value="{{ Auth::user()->birthdate }}">
        <label for="">Country</label>
        <input type="text" class="form-control" name="country" placeholder="Country" value="{{ Auth::user()->country }}">
        <input type="submit" value="Edit">
    </form>

</div>
<!--Push all countries to the select list-->
<script src="charts/countryList.js"></script>
@endsection