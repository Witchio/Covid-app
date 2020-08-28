<!-- extend from tempate -->
@extends('layouts.app')

<!-- Style -->
@section('style')
<link href="{{ asset('css/about-us.css') }}" rel="stylesheet">
@endsection

<!-- Content -->
@section('content')
<h1>About us/ Contact</h1>
<section>

    <article id="mitchio" class="dark">
        <img src='{{asset("images/supremeleader.jpg")}}' alt="leader pic">
        <h2>SUPREME LEADER</h2>
        <p>
            Organa kit sidious owen antilles. Bothan dooku ben palpatine. Moff hutt darth mara lars skywalker moff windu yoda. Darth fisto darth lando lando lando fisto. Darth dantooine moff jabba amidala kessel calrissian. Sidious maul mandalore antilles tatooine luke moff darth. Sith leia darth antilles darth. Lando jade hutt obi-wan mon mothma ackbar.</p>
    </article>
    <hr>

    <article id="luchi" class="light">¨
        <img src=' {{asset("images/luchi.jpg")}}' alt="leader pic">
        <h2>MAIN LEADER</h2>
        <P>Loaded to the gunwalls flogging aye Corsair spike Buccaneer keel furl strike colors yawl. Fathom lee ho Buccaneer lanyard starboard Shiver me timbers smartly dance the hempen jig Yellow Jack. Chase lanyard squiffy pillage Yellow Jack snow execution dock Admiral of the Black Pirate Round run a rig.</P>
    </article>
    <hr>

    <article id="jo" class="dark">
        <img src='{{asset("images/jo.jpg")}}' alt="leader pic">
        <h2>MISLEADER</h2>
        <P>Toffee muffin tootsie roll. Biscuit pudding apple pie pie. Chocolate bar bear claw gummies jelly-o chocolate sesame snaps danish macaroon. Chupa chups candy croissant dragée toffee. Pastry cookie wafer cake gummi bears. Jelly-o liquorice sweet roll caramels marzipan gummies gummies wafer biscuit. Tart liquorice cake bear claw cotton candy danish. Tiramisu gummi bears macaroon.</P>
    </article>
    <hr>

    <article id="edu" class="light">
        <img src=' {{asset("images/edu.jpg")}}' alt="leader pic">
        <h2>EDU LEADER</h2>
        <p>We need to harvest synergy effects time to open the kimono that ipo will be a game-changer, and build on a culture of contribution and inclusion. First-order optimal strategies personal development yet future-proof take five, punch the tree, and come back in here with a clear head pulling teeth, optimize the fireball and we need to harvest synergy effects.</p>
    </article>

</section>
@endsection