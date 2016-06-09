@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    @if($post->hasHeader())
        <img src="/media/header/{{ $post->header_path }}.png" alt="" width="100%">
    @else
        <div class="header"></div>
    @endif
    <div class="container content">
        <article>
            <h3 class="article-title">
                {{ $post->title }}
            </h3>
            <h5 class="article-time">
                {{ trans_choice('date.days_since', $post->daysSinceCreated(), ['days' => $post->daysSinceCreated()]) }}
            </h5>
            {{-- <p>
                <b class="article-description">
                    {!! $post->description !!}
                </b>
            </p> --}}
            <div class="row">
                <div class="col-md-8">
                    {!! $post->body!!}
                </div>
            </div>
            <br>
            <a href="/blog">
                <span class="fa fa-arrow-left"></span> Terug naar overzicht
            </a>
        </article>
    </div>
@endsection
