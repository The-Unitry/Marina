@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="boat/create" class="btn btn-primary">
            Create boat
        </a>
        <h3>Boats</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($boats as $boat)
                <tr>
                    <td>
                        {{ $boat->id }}
                    </td>
                    <td>
                        {{ $boat->title }}
                    </td>
                    <td>
                        <a href="/admin/page/{{ $boat->id }}">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection