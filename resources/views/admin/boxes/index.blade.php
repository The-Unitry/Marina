@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="/admin/box/create" class="btn btn-primary">
        Create box
    </a>
    <h3>Boxes</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Code</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($boxes as $box)
            <tr>
                <td>
                    {{ $box->id }}
                </td>
                <td>
                    {{ $box->scaffold->code . $box->id }}
                </td>
                <td>
                    <a href="/admin/box/{{ $box->id }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection