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
                <h3>Lorem ipsum</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto autem consequuntur deserunt hic in.
                </p>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-responsive anchor" src="/img/anchor.png"/>
                <h3>Lorem ipsum</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto autem consequuntur deserunt hic in.
                </p>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-responsive anchor" src="/img/anchor.png"/>
                <h3>Lorem ipsum</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto autem consequuntur deserunt hic in.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
