@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="/admin/boat/create" class="btn btn-primary">
        Create boat
    </a>
    <h3>Boats</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($boats as $boat)
            <tr>
                <td>
                    {{ $boat->id }}
                </td>
                <td>
                    {{ $boat->name }}
                </td>
                <td>
                    {{ $boat->owner->name }}
                </td>
                <td>
                    <a href="/admin/boat/{{ $boat->id }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection