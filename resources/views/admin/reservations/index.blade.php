@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="/admin/reservation/create" class="btn btn-primary">
            Create reservation
        </a>
        <h3>Reservations</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Requester</th>
                <th>Start date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>
                        {{ $reservation->id }}
                    </td>
                    <td>
                        {{ $reservation->requester->name }}
                    </td>
                    <td>
                        {{ ucfirst($reservation->role->name) }}
                    </td>
                    <td>
                        <a href="/admin/user/{{ $reservation->id }}">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection