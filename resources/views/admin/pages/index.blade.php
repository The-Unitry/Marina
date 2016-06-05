@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="title-box">
        <a href="/admin/page/create" class="btn btn-primary pull-right">
            Create page
        </a>
        <h3>Pages</h3>
    </div>
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
</div>
@endsection