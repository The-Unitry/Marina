@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <h3>
            <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
        </h3>
        <h5>
            Geplaatst op {{ $post->date() }}
        </h5>
        <br>
        <p>{!! $post->description !!}</p>
        <hr>
    @endforeach
</div>
@endsection
