@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="user/create" class="btn btn-primary">
        Create user
    </a>
    <h3>Users</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Role</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ ucfirst($user->role->name) }}
                </td>
                <td>
                    <a href="/admin/user/{{ $user->id }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection