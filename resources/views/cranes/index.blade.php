@extends('layouts.app')

@section('title')
    Kraanplan
@endsection

@section('content')
    <div class="container content">
        <h3>
            Kraanplan
        </h3>
        <br>
        <iframe class="frame frame-control" data-frameload="true" src="https://kraanreserverendeknar.youcanbook.me/" width="100%" height="600" frameborder="0"></iframe>
    </div>
@endsection
