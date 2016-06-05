@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="box/create" class="btn btn-primary">
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
                    {{ $box->code }}
                </td>
                <td>
                    <a href="/admin/page/{{ $box->id }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection