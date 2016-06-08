@extends('layouts.admin')

@section('title')
    {{ trans('menu.reservations') }}
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>{{ trans('columns.requester') }}</th>
            <th>{{ trans('columns.start_date') }}</th>
            <th>{{ trans('columns.end_date') }}</th>
            <th>{{ trans('columns.box') }}</th>
            <th>{{ trans('columns.approved') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $i => $reservation)
            <tr data-href="/admin/reservation/{{ $reservation->id }}" class="clickable-row">
                <td>
                    {{ $i + 1 }}
                </td>
                <td>
                    {{ $reservation->requester->name }}
                </td>
                <td>
                    {{ $reservation->start }}
                </td>
                <td>
                    {{ $reservation->end }}
                </td>
                <td>
                    {{ $reservation->box->getFullCode() }}
                </td>
                <td>
                    {{ ($reservation->approved) ? trans('columns.yes') : trans('columns.no') }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection