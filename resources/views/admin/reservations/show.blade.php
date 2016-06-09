@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
        {{ trans('actions.create.reservation') }}
    @elseif ($method == 'PATCH')
        {{ trans('actions.edit.reservation') }}
    @endif
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/reservation' : '/admin/reservation/' . $reservation->id }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">{{ trans('columns.start_date') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="start" id="start" value="{{ $reservation->start or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">{{ trans('columns.end_date') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="end" id="end" value="{{ $reservation->end or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="boat_id" class="col-sm-2 control-label">{{ trans('columns.boat') }}</label>
                        <div class="col-sm-10">
                            <select name="boat_id" id="boat_id" class="form-control">
                                @foreach ($boats as $boat)
                                    <option value="{{ $boat->id }}">{{ $boat->name }} ({{ $boat->owner->name }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="box_id" class="col-sm-2 control-label">{{ trans('columns.box') }}</label>
                        <div class="col-sm-10">
                            <select name="box_id" id="box_id" class="form-control">
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}" {{ (isset($reservation) && $box->id == $reservation->box->id) ? 'selected' : '' }}>
                                        {{ $box->getFullCode() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount_of_persons" class="col-sm-2 control-label">{{ trans('columns.amount_of_nights') }}</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="amount_of_persons" id="amount_of_persons" value="{{ $reservation->amount_of_persons or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="approved" class="col-sm-2 control-label">{{ trans('columns.approved') }}</label>
                        <div class="col-sm-10">
                            <select name="approved" id="approved" class="form-control">
                                <option value="0">{{ trans('columns.yes') }}</option>
                                <option value="1" {{ (isset($reservation) && ($reservation->approved)) ? 'selected' : '' }}>{{ trans('columns.no') }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> 
                        {{ trans('actions.save') }}</button>
                        <a href="../reservation" class="list-group-item"><span class="fa fa-arrow-left"></span> {{ trans('actions.back') }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection