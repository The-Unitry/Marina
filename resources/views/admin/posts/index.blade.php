@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="post/create" class="btn btn-primary">
        Create post
    </a>
    <h3>Posts</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        {{ $post->id }}
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        <a href="/admin/post/{{ $post->id }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection