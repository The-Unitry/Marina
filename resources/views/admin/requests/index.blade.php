@extends('layouts.admin')

@section('title')
    {{ trans('menu.requests') }}
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th>{{ trans('columns.requester') }}</th>
            <th>{{ trans('columns.start_date') }}</th>
            <th>{{ trans('columns.end_date') }}</th>
            <th>{{ trans('columns.approved') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $i => $reservation)
            @if($reservation->box->scaffold->hidden)
            <tr data-href="/admin/request/{{ $reservation->id }}" class="clickable-row">
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
                    {{ ($reservation->approved) ? trans('columns.yes') : trans('columns.no') }}
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection