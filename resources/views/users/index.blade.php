@extends('layouts.app')

@section('title')
    {{ trans('menu.user_preferences') }}
@endsection

@section('content')
<div class="container content">
    <h3>
        Gebruikersgegevens
    </h3>
    <br>
    <div class="row">
        <form class="form-horizontal" action="{{ '/user' }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="user_adress" class="col-sm-2 control-label">{{ trans('columns.user_adress') }}</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user_adress" id="user_adress" value="{{ $user->address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_city" class="col-sm-2 control-label">{{ trans('columns.user_city') }}</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="user_city" id="user_city" value="{{ $user->city }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-2 control-label">{{ trans('columns.phone_number') }}</label>
                        <div class="col-sm-10">
                            <input type="" class="form-control" name="phone_number" id="phone_number" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_mail" class="col-sm-2 control-label">{{ trans('columns.user_mail') }}</label>
                        <div class="col-sm-10">
                            <input type="E-mail" class="form-control" name="user_mail" id="user_mail" value="{{ $user->email }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('actions.save') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
