@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>
            @if ($method == 'POST')
                Create user
            @elseif ($method == 'PATCH')
                Update user
            @endif
        </h3>
        <hr>
        @if(Session::has('message'))
            <div class="alert alert-success" id="alert" role="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <span>{{ Session::get('message') }}</span>
            </div>
        @endif
        <div class="row">
            <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/user' : '/admin/user/' . $user->id }}" method="post">
                <div class="row">
                    <div class="col-md-10">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $user->name or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="{{ $user->email or '' }}">
                            </div>
                        </div>
                        @if ($method == 'POST')
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="body" class="col-sm-2 control-label">Role</label>
                            <div class="col-sm-10">
                                <select name="role_id" id="" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ (isset($user) && $user->role->id == $role->id) ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="list-group">
                            <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                            <a href="../user" class="list-group-item"><span class="glyphicon glyphicon-triangle-left"></span> Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection