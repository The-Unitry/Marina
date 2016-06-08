@extends('layouts.admin')

@section('title')
    {{ trans('navigation.posts') }}
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>{{ trans('userinfo.title') }}</th>
                <th>{{ trans('userinfo.created') }}</th>
                <th>{{ trans('userinfo.author') }}</th>
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
                    <td>
                        {{ $post->author->name }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection