@extends('layouts.app')

@section('content')
<div class="header">
    <div class="container">
        <div class="main-title">
            <h1>Boek makkelijk en online je ligplaats</h1>
        </div>
        <a href="#">
            <a href="/reserveren" class="btn btn-signup">
                Boeken
            </a>
        </a>
    </div>
</div>

<div class="posts">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img class="img-responsive anchor" src="/img/anchor.png"/>
                <h3>Online reserveren</h3>
                <p>
                    Boek met ons handige filter een box die geschikt is voor jouw boot en beschikbaar is tussen de door jou opgegeven datums.
                </p>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-responsive anchor" src="/img/anchor.png"/>
                <h3>Overzicht</h3>
                <p>
                    Door een overzicht te geven van je reserveringen, weet je altijd waar je aan toe bent. Altijd en overal.
                </p>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-responsive anchor" src="/img/anchor.png"/>
                <h3>Facturatie</h3>
                <p>
                    Facturen worden digitaal verstuurd, en zijn terug te vinden in het overzicht van je reserveringen.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
