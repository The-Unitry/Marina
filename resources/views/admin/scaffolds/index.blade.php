@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="/admin/scaffold/create" class="btn btn-primary">
            Create scaffold
        </a>
        <h3>Scaffolds</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Boxes</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($scaffolds as $scaffold)
                <tr>
                    <td>
                        {{ $scaffold->id }}
                    </td>
                    <td>
                        {{ $scaffold->code }}
                    </td>
                    <td>
                        {{ count($scaffold->boxes) }}
                    </td>
                    <td>
                        <a href="/admin/scaffold/{{ $scaffold->id }}">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection