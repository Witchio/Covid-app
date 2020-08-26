<!-- extends from template -->
@extends('layouts.app')

<!-- creates section for content -->
@section('content')

<h3>Hellooo <a> {{ Auth::user()->name }}</a></h3>
<h4>Your email is <a> {{ Auth::user()->email }}</a></h4>
<p>Please update some additional info</p>

<!-- Profile forms --> 
<div class="profileForm">
    <form action="/profile/update" method="post">
    @csrf
    @method('PUT')
        <input type="text" name="first_name" placeholder="First Name" value="{{ Auth::user()->first_name }}">
        <input type="text" name="last_name" placeholder="Last Name" value="{{ Auth::user()->last_name }}">
        <input type="text" name="nationality" placeholder="Nationality" value="{{ Auth::user()->nationality }}">
        <input type="text" name="birthdate" placeholder="Date of Birth" value="{{ Auth::user()->birthdate }}">
        <input type="text" name="country" placeholder="Country" value="{{ Auth::user()->country }}">       
        <input type="submit" value="Add">
    </form>

</div>
@endsection