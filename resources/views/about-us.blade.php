<!-- extend from tempate -->
@extends('layouts.app')

<!-- Style -->
@section('style')
<link href="{{ asset('css/about-us.css') }}" rel="stylesheet">
@endsection

<!-- Content -->
@section('content')
<h1>About us/ Contact</h1>
<section id="cards">

    <article id="mitchio" class="dark">
        <div class="content">
            <img src='{{asset("images/mitchio.jpg")}}' alt="leader pic">
            <h2>Mitchio Weber</h2>
            <p>
                Hello everyone ! My name is Mitchio, I'm japanese-luxembourgish and a physics graduate. My main contributions were the stats page, the login/register and the admin dashboards. I was also assigned as the project leader and took care of ensuring a nice workflow by assigning the tasks, using sprint backlogs on trello.</p>
        </div>
        <div class="links">
            <a href="https://www.linkedin.com/in/mitchio-weber-4328021ab/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/Witchio" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </article>

    <article id="luchi" class="light">
        <div class="content">
            <img src=' {{asset("images/luciana.jpg")}}' alt="leader pic">
            <h2>Luciana Scalfaro</h2>
            <P>Loaded to the gunwalls flogging aye Corsair spike Buccaneer keel furl strike colors yawl. Fathom lee ho Buccaneer lanyard starboard Shiver me timbers smartly dance the hempen jig Yellow Jack. Chase lanyard squiffy pillage Yellow Jack snow execution dock Admiral of the Black Pirate Round run a rig.</P>
        </div>
        <div class="links">
            <a href="https://www.linkedin.com/in/luciana-scalfaro/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/luciana-s" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </article>

    <article id="jo" class="dark">
        <div class="content">
            <img src='{{asset("images/joanna.jpg")}}' alt="leader pic">
            <h2>Joanna Wong </h2>
            <p>@joundefined likes to dream about rainbows and unicorns and being pretty. She does not spend time honing her coding skills. She doesn't enjoy solving logical or technical puzzles. She doesn't live and breathe code and algorithms. SHe doesn't aspire to be part of the underground hacker community, because that doesn't exsist, obviously.</p>
        </div>
        <div class="links">
            <a href="https://www.linkedin.com/in/joanna-w-4584a9163/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/joundefined" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </article>

    <article id="edu" class="light">
        <div class="content">
            <img src=' {{asset("images/eduardo.jpg")}}' alt="leader pic">
            <h2>Eduardo Pinto</h2>
             <p>Hi, I'm Eduardo. My main focus in the project was to define a way to include a responsive news feed to the main page which displays the most recent events about Covid-19 pandemic. Then I've created a profile page, that gets and sends user info into the database, and improved the original navigation bar with some new links and routes. Finally I created a responsive footer with social networking interaction.</p>
        </div>

        <div class="links">
            <a href="https://www.linkedin.com/in/eduardopinto-dev/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/pintoedu" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </article>
</section>

@endsection