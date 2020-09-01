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
<div class="profileForm">
    <h1 id="title">Update Profile</h1>

    <p>
        <span>Username :</span> {{ Auth::user()->name }}
    </p>
    <p>
        <span>Email :</span> {{ Auth::user()->email }}
    </p>

    <!-- Profile forms -->
    <form action="/profile/update" method="post">
        @csrf
        @method('PUT')
        <h4>First Name</h4>
        <div class="datadisplay">
            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ Auth::user()->first_name }}">
            @if(Auth::user()->first_name !== null)
            <p>{{ Auth::user()->first_name }}</p>
            @else
            <p>
                please enter your first name
            </p>
            @endif
        </div>
        <h4>Last Name</h4>
        <div class="datadisplay">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ Auth::user()->last_name }}">
            @if(Auth::user()->last_name !== null)
            <p>{{ Auth::user()->last_name }}</p>
            @else
            <p>
                please enter your last name
            </p>
            @endif
        </div>
        <!-- <input type="text" name="nationality" placeholder="Nationality" value="{{ Auth::user()->nationality }}"> -->
        <h4>Nationality</h4>
        <div class="datadisplay">
            <select class="form-control" id="select" name="nationality">
                <option selected>{{ Auth::user()->nationality }}</option>
                <option class="option" value="">...</option>
            </select>
            @if(Auth::user()->nationality !== null)
            <p>{{ Auth::user()->nationality }}</p>
            @else
            <p>
                please enter your nationality
            </p>
            @endif
        </div>
        <h4>Birthdate</h4>
        <div class="datadisplay">
            <input type="date" class="form-control" name="birthdate" placeholder="Date of Birth" value="{{ Auth::user()->birthdate }}">
            @if(Auth::user()->birthdate !== null)
            <p>{{ Auth::user()->birthdate }}</p>
            @else
            <p>
                please enter your birthdate
            </p>
            @endif
        </div>
        <h4>Country</h4>
        <div class="datadisplay">
            <input type="text" class="form-control" name="country" placeholder="Country" value="{{ Auth::user()->country }}">
            @if(Auth::user()->country !== null)
            <p>{{ Auth::user()->country }}</p>
            @else
            <p>
                please enter your country of residence
            </p>
            @endif
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>

</div>
<!--Push all countries to the select list-->
<script src="charts/profileCountries.js"></script>
@endsection