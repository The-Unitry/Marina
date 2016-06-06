@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/mijn-boten/nieuw" class="btn btn-primary pull-right">
            Boot toevoegen
        </a>
        <h3>
            Mijn boten
        </h3>
        <br>
        @foreach($boats as $boat)
            <div class="row">
                <div class="col-md-2">
                    <img src="http://www.jenzen.nl/site/content/images/boot.jpg" alt="" width="100%">
                </div>
                <div class="col-md-10">
                    <h3>
                        {{ $boat->name }}
                    </h3>
                    <h5>
                        {{ $boat->brand }} - {{ $boat->type }}
                    </h5>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
