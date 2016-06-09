@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    @if($post->hasHeader())
    <img src="/media/header/{{ $post->header_path }}.png" alt="" width="100%">
    @endif
    <div class="container content">
        <br>
        <article>
            <h3>
                {{ $post->title }}
            </h3>
            <h5>
                {{ trans_choice('date.days_since', $post->daysSinceCreated(), ['days' => $post->daysSinceCreated()]) }}
            </h5>
            <br>
            <p>
                <b class="description">
                    {!! $post->description !!}
                </b>
            </p>
            <p>
                {!! $post->body!!}
            </p>
            <br>
            <a href="/blog">
                <span class="fa fa-arrow-left"></span> Terug naar overzicht
            </a>
        </article>
    </div>
@endsection
