@extends('layouts.admin')

@section('title')
    {{ trans('menu.boats') }}
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>{{ trans('columns.title') }}</th>
            <th>{{ trans('columns.owner') }}</th>
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
@endsection