@extends('layouts.app')

@section('content')
    <div class="container content">
        <h3>
            {{ $post->title }}
        </h3>
        <h5>
            Geplaatst op {{ $post->date() }}
        </h5>
        <br>
        <p>
            <b>
                {!! $post->description !!}
            </b>
        </p>
        <p>
            {!! $post->body!!}
        </p>
        <br>
        <a href="/">
            <span class="fa fa-arrow-left"></span> Terug naar overzicht
        </a>
    </div>
@endsection
