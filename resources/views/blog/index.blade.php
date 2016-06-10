@extends('layouts.app')

@section('title')
    Nieuws
@endsection

@section('content')
    <div class="container content">
        <h3>
            Nieuws
        </h3>
        <br>
        <div>
            @foreach($posts as $post)
                <article class="row">
                    <div class="col-md-2">
                        <a href="/blog/{{ $post->slug }}">
                            <img src="/media/small/{{ ($post->hasHeader()) ? $post->header_path : 'anchor_placeholder' }}.png" alt="" width="100%" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-md-10">
                        <h3 class="article-title">{{ $post->title }}</h3>
                        <h5 class="article-time">{{ trans_choice('date.days_since', $post->daysSinceCreated(), ['days' => $post->daysSinceCreated()]) }}</h5>
                        <p>{!! $post->description !!}</p>
                        <a href="/blog/{{ $post->slug }}" class="btn btn-primary pull-right">Lees meer</a>
                    </div>
                </article>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
