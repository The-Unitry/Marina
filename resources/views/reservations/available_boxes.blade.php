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
                        @foreach($boxes as $box)
                            <a href="/reserveren/store/{{ $filled['boat_id'] }}/{{ $filled['start'] }}/{{ $filled['end'] }}/{{ $filled['amount_of_persons'] }}/{{ $box->id }}" class="list-group-item">
                                {{ $box->getFullCode() }} 
                                <span class="pull-right">({{ $box->width / 100 }}m x {{ $box->length / 100 }}m)</span>
                            </a>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Uw zekerheden</h4>
                <ul class="list-unstyled">
                    <li><span class="fa fa-check"></span> Lorem ipsum dolor</li>
                    <li><span class="fa fa-check"></span> Consectetur adipisicing elit</li>
                    <li><span class="fa fa-check"></span> Aperiam eligendi et eum</li>
                    <li><span class="fa fa-check"></span> Omnis repellendus voluptatem</li>
                </ul>
            </div>
        </div>
    </div>
@endsection