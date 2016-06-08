@extends('layouts.admin')

@section('title')
    {{ trans('navigation.reservations') }}
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>{{ trans('reservation.requester') }}</th>
            <th>{{ trans('reservation.start_date') }}</th>
            <th>{{ trans('reservation.end_date') }}</th>
            <th>{{ trans('reservation.box') }}</th>
            <th>{{ trans('reservation.approved') }}</th>
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
                    {{ ($reservation->approved) ? 'Yes' : 'No' }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection