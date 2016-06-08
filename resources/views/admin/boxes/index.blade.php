@extends('layouts.admin')

@section('title')
    {{ trans('menu.boxes') }}
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>{{ trans('columns.code') }}</th>
            <th>{{ trans('columns.available') }}</th>
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
                    {{ ($box->isAvailable()) ? trans('columns.available') : trans('columns.unavailable') }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection