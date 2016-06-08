@extends('layouts.app')

@section('content')
<div class="header">
    <div class="container">
        <div class="main-title">
            <h1>{{ trans('welcome.slogan') }}</h1>
        </div>
        <a href="#">
            <a href="/reserveren" class="btn btn-signup">
                {{ trans('welcome.reserve') }}
            </a>
        </a>
    </div>
</div>

<div class="posts">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img class="img-responsive anchor" src="/img/anchor.png"/>
                <h3>{{ trans('welcome.item_one_title') }}</h3>
                <p>
                    {{ trans('welcome.item_one_description') }}
                </p>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-responsive anchor" src="/img/anchor.png"/>
                <h3>{{ trans('welcome.item_two_title') }}</h3>
                <p>
                    {{ trans('welcome.item_two_description') }}
                </p>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-responsive anchor" src="/img/anchor.png"/>
                <h3>{{ trans('welcome.item_three_title') }}</h3>
                <p>
                    {{ trans('welcome.item_three_description') }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
