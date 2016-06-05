@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="/admin/reservation/create" class="btn btn-primary">
            Create reservation
        </a>
        <h3>Reservations</h3>
        <table class="table table-striped" id="datatable">
            <thead>
            <tr>
                <th width="5%">#</th>
                <th>Requester</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Approved</th>
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
                        {{ ($reservation->approved) ? 'Yes' : 'No' }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection