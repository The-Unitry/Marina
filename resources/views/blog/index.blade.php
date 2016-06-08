@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <div class="container content">
        <h3>
            Blog
        </h3>
        <br>
        <div>
            @foreach($posts as $post)
                <article class="row">
                    <div class="col-md-2">
                        @if($post->hasHeader())
                        <a href="/blog/{{ $post->slug }}">
                            <img src="/media/small/{{ $post->header_path }}.png" alt="" width="100%" class="img-responsive">
                        </a>
                        @endif
                    </div>
                    <div class="col-md-10">
                        <a href="/blog/{{ $post->slug }}">
                            <h4>{{ $post->title }}</h4>
                        </a>
                        <h5>{{ trans_choice('date.days_since', $post->daysSinceCreated(), ['days' => $post->daysSinceCreated()]) }}</h5>
                        <p>{!! $post->description !!}</p>
                    </div>
                </article>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
