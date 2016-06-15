@extends('layouts.app')

@section('title')
    Mijn reserveringen
@endsection

@section('content')
    <div class="container content">
        <h3>
            Mijn reserveringen
        </h3>
        <br>
        @foreach($reservations as $reservation)
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        {{ $reservation->box->getFullCode() }}
                    </h3>
                    <h5>
                        {{ $reservation->start }} - {{ $reservation->end }}
                    </h5>
                    <a href="/contact?message=Ik zou graag mijn box ({{ $reservation->box->getFullCode() }}) willen vrijstellen van X tot X" class="btn btn-default pull-right">
                        Tijdelijk vrijstellen
                    </a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
