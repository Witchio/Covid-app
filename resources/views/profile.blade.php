<!-- extends from template -->
@extends('layouts.app')

<!-- creates section for content -->
@section('content')

<h3>Hellooo <a> {{ Auth::user()->name }}</a></h3>
<p>Please update some additional info from you</p>

<div class="profileForm">
    <form action="#" method="POST">
        <input type="text" name="firstName" placeholder="First Name">
        <input type="text" name="lastName" placeholder="Last Name">
        <input type="text" name="nationality" placeholder="Nationality">
        <input type="text" name="birthdate" placeholder="Date of Birth">
        <input type="text" name="country" placeholder="Country">
        <input type="img" name="avatar" placeholder="Choose your avatar">
        <input type="submit" value="Send">
    </form>

</div>
@endsection