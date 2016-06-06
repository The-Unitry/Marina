@extends('layouts.admin')

@section('title')
    Boxes
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>Code</th>
            <th>Available</th>
        </tr>
        </thead>
        <tbody>
        @foreach($boxes as $i => $box)
            <tr data-href="/admin/box/{{ $box->id }}" class="clickable-row">
                <td>
                    {{ $i + 1 }}
                </td>
                <td>
                    {{ $box->scaffold->code . $box->id }}
                </td>
                <td>
                    {{ ($box->isAvailable()) ? 'Available' : 'Unavailable' }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection