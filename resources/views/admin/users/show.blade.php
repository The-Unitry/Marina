@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
    {{ trans('navigation.create_user') }}
    @elseif ($method == 'PATCH')
    {{ trans('navigation.edit_user') }}
    @endif
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/user' : '/admin/user/' . $user->id }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">{{ trans('regular.name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">{{ trans('regular.email') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">{{ trans('userinfo.phone_number') }}</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" name="phone" id="phone" value="{{ $user->phone or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-sm-2 control-label">{{ trans('userinfo.city') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" id="city" value="{{ $user->city or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="zip" class="col-sm-2 control-label">{{ trans('userinfo.zip_code') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="zip" id="zip" value="{{ $user->zip or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">{{ trans('userinfo.address') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" id="address" value="{{ $user->address or '' }}">
                        </div>
                    </div>
                    @if ($method == 'POST')
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">{{ trans('userinfo.password') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="role_id" class="col-sm-2 control-label">{{ trans('userinfo.role') }}</label>
                        <div class="col-sm-10">
                            <select name="role_id" id="role_id" class="form-control">
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
                        <a href="../user" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection