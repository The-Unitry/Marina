@extends('layouts.app')

@section('title')
    {{ trans('menu.reservations') }}
@endsection

@section('content')
    <div class="container content">
        <h3>
            Beschikbare boxen
        </h3>
        <div class="row">
            <p class="text col-md-8">
                Deze boxen zijn voor jouw boot geschikt en zijn tijdens de opgegeven datums beschikbaar.
            </p>
        </div>
        <hr>
        <div class="row">
            <div class="steps col-md-8">
                <form action="/reserveren" method="post">
                    {{ csrf_field() }}
                    <div class="list-group">
                        @if(!count($boxes))
                            <div class="list-group-item">
                                Er zijn helaas momenteel geen boxen beschikbaar. Neem <a href="/contact">contact</a> op met de jachthaven of zoek op <a href="/reserveren">een andere periode</a>.
                            </div>
                        @endif
                        @foreach($boxes as $box)
                            <div class="list-group-item">
                                {{ $box->code }} <small>(&euro; {{ euro($box->price_per_night) }} per nacht)</small> <small>(lengte:{{ $box->length }}m x breedte: {{ $box->width }}m )</small>
                                <span class="pull-right">
                                    <a href="/reserveren/store/{{ $filled['boat_id'] }}/{{ $filled['start'] }}/{{ $filled['end'] }}/{{ $filled['amount_of_persons'] }}/{{ $box->id }}">
                                    Boeking bevestigen
                                    </a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Uw zekerheden</h4>
                <ul class="list-unstyled">
                    <li><span class="fa fa-check"></span> Snel en makkelijk je box boeken</li>
                    <li><span class="fa fa-check"></span> Handig overzicht van je reserveringen</li>
                    <li><span class="fa fa-check"></span> Online je boeking annuleren</li>
                    <li><span class="fa fa-check"></span> Snel en simpel contact met de jachthaven</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
