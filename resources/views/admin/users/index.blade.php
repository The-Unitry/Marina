@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="user/create" class="btn btn-primary">
        Create user
    </a>
    <h3>Users</h3>
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $i => $user)
            <tr data-href="/admin/user/{{ $user->id }}" class="clickable-row">
                <td>
                    {{ $i + 1}}
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
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection