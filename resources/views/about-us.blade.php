<!-- extend from tempate -->
@extends('layouts.app')

<!-- Style -->
@section('style')
<link href="{{ asset('css/about-us.css') }}" rel="stylesheet">
@endsection

<!-- Content -->
@section('content')
<h1>About us / Contact</h1>
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
            <P>Hello, my name is Luciana, and i am from Argentina. I like piña coladas and getting caught in the rain. On the project i worked on various posts features, and on Responsive Web Design. I was the point person for conflicts and issues on GitHub, our collaboration platform. I helped design the website layout and writing the code that connects our site to our database. Write to me and escape</P>
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
            <p>Hello world! I oversaw the database design and execution process. I helped write the code that connects our website to our Database and added various security features on different levels of the data structure to the website to manage Access Permissions to our features and overall Data Security. I also worked on the website layout design and implemented Responsive Web Design for multi-device usage.</p>
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
