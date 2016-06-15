@extends('layouts.app')

@section('title')
    Mijn boten
@endsection

@section('content')
    <div class="container content">
        <a href="/mijn-boten/nieuw" class="btn btn-primary pull-right">
            {{ trans('actions.create.boat') }}
        </a>
        <h3>
            Mijn boten
        </h3>
        <br>
        @foreach($boats as $boat)
            <div class="row">
                <div class="col-md-2">
                    <a href="/mijn-boten/{{ $boat->id }}">
                        <img src="/media/medium/{{ ($boat->image_path) ? : '../small/anchor_placeholder' }}.png" alt="" width="100%">
                    </a>
                </div>
                <div class="col-md-10">
                    <h3>
                        <a href="/mijn-boten/{{ $boat->id }}">
                            {{ $boat->name }}
                        </a>
                    </h3>
                    <h5>
                        {{ $boat->brand }} - {{ trans('columns.' . strtolower($boat->type)) }}
                    </h5>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
