@extends('layouts.admin')

@section('title')
    Pages
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>Title</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $i => $page)
            <tr data-href="/admin/page/{{ $page->id }}" class="clickable-row">
                <td>
                    {{ $i + 1 }}
                </td>
                <td>
                    {{ $page->title }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection