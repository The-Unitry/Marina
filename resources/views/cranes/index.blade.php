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
        <iframe class="frame frame-control" data-frameload="true" src="https://kraanreserverendeknar.youcanbook.me/" frameborder="0" width="100%" height="600"></iframe>
        <style>
            .frame-wrapper {
                position: relative;
            }

            .frame-loader {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url('/img/loader.gif') center center no-repeat;
            }
        </style>
    </div>
@endsection
