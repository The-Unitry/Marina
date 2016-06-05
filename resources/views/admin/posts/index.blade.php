@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="/admin/post/create" class="btn btn-primary">
        Create post
    </a>
    <h3>Posts</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Created</th>
                <th></th>
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
                        {{ $post->created_at }}
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