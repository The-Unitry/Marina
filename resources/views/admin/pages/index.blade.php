@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="page/create" class="btn btn-primary">
        Create page
    </a>
    <h3>Pages</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr>
                <td>
                    {{ $page->id }}
                </td>
                <td>
                    {{ $page->title }}
                </td>
                <td>
                    <a href="/admin/page/{{ $page->id }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection