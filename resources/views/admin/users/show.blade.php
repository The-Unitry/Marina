@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
    {{ trans('actions.create.user') }}
    @elseif ($method == 'PATCH')
    {{ trans('actions.edit.user') }}
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
                        <label for="name" class="col-sm-2 control-label">{{ trans('columns.name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">{{ trans('columns.email') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">{{ trans('columns.phone_number') }}</label>
                        <div class="col-sm-10">
                            <input type="text" minlength="10" maxlength="10" pattern="\b\d{3}[-.]?\d{3}[-.]?\d{4}\b" title="Het moet minimaal 10 nummers bevatten!" class="form-control" name="phone" id="phone" value="{{ $user->phone or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-sm-2 control-label">{{ trans('columns.city') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" id="city" value="{{ $user->city or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="zip" class="col-sm-2 control-label">{{ trans('columns.zip_code') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="zip" id="zip" value="{{ $user->zip or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">{{ trans('columns.address') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" id="address" value="{{ $user->address or '' }}">
                        </div>
                    </div>
                    @if ($method == 'POST')
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">{{ trans('columns.password') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="role_id" class="col-sm-2 control-label">{{ trans('columns.role') }}</label>
                        <div class="col-sm-10">
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ (isset($user) && $user->role->id == $role->id) ? 'selected' : '' }}>
                                        {{ trans('columns.roles.' . $role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('actions.save') }}</button>
                        <a href="../user" class="list-group-item"><span class="fa fa-arrow-left"></span> {{ trans('actions.back') }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
