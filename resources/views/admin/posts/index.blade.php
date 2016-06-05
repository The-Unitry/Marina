@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="/admin/post/create" class="btn btn-primary">
        Create post
    </a>
    <h3>Posts</h3>
    <table class="table table-striped" id="datatable">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Title</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $i => $post)
                <tr data-href="/admin/post/{{ $post->id }}" class="clickable-row">
                    <td>
                        {{ $i + 1 }}
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection