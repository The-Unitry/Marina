@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="/admin/boat/create" class="btn btn-primary">
        Create boat
    </a>
    <h3>Boats</h3>
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>Title</th>
            <th>Owner</th>
        </tr>
        </thead>
        <tbody>
        @foreach($boats as $i => $boat)
            <tr data-href="/admin/boat/{{ $boat->id }}" class="clickable-row">
                <td>
                    {{ $i + 1 }}
                </td>
                <td>
                    {{ $boat->name }}
                </td>
                <td>
                    {{ $boat->owner->name }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection