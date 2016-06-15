@extends('layouts.admin')

@section('content')
<div class="container content">
    <h3>
        {{ trans('columns.newsletter') }}
    </h3>
    <br>
    <div class="row">
        <form action="/newsletter" class="form-horizontal col-md-12" role="form" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="to" class="col-sm-2 control-label">{{ trans('columns.to') }}</label>
                <div class="col-sm-10">
                    <input class="form-control" rows="4" name="to"></input>
                </div>
            </div>
            <div class="form-group">
                <label for="subject" class="col-sm-2 control-label">{{ trans('columns.subject') }}</label>
                <div class="col-sm-10">
                    <input class="form-control" rows="4" name="subject" placeholder="{{ trans('columns.subject') }}"></input>
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-sm-2 control-label">{{ trans('columns.message') }}</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" name="body"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">{{ trans('actions.send.newsletter') }}</button>
        </form>
    </div>
</div>
@endsection
