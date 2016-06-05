@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="page/create" class="btn btn-primary">
        Create page
    </a>
    <h3>Page</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>#</td>
            <td>Title</td>
            <td></td>
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