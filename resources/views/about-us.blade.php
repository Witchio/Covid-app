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
                Organa kit sidious owen antilles. Bothan dooku ben palpatine. Moff hutt darth mara lars skywalker moff windu yoda. Darth fisto darth lando lando lando fisto. Darth dantooine moff jabba amidala kessel calrissian. Sidious maul mandalore antilles tatooine luke moff darth. Sith leia darth antilles darth. Lando jade hutt obi-wan mon mothma ackbar.</p>
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
            <p>We need to harvest synergy effects time to open the kimono that ipo will be a game-changer, and build on a culture of contribution and inclusion. First-order optimal strategies personal development yet future-proof take five, punch the tree, and come back in here with a clear head pulling teeth, optimize the fireball and we need to harvest synergy effects.</p>
        </div>

        <div class="links">
            <a href="https://www.linkedin.com/in/eduardopinto-dev/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/pintoedu" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </article>
</section>

@endsection
