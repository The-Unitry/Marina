@extends('layouts.app')

@section('content')
<div class="container content">
    <h3>
        Mijn boxen
    </h3>
    <br>
    @foreach($boxes as $box)
        <a class="row" href="/mijn-boxen/{{ $box->id }}">
            <div class="col-md-2">
                <img src="http://www.de-wilgenhoek.nl/wp-content/uploads/2016/02/Jachthaven-De-Wilgenhoek.jpg" alt="" width="100%">
            </div>
            <div class="col-md-10">
                <h3>
                    {{ $box->code }}
                </h3>
                <h5>
                    {{ $box->price_per_night }} - {{ $box->depth }}
                </h5>
            </div>
        </a>
        <hr>
    @endforeach
</div>
@endsection
