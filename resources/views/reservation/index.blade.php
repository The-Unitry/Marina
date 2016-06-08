@extends('layouts.app')

@section('content')
    <div class="container content">
        <h3>
            {{ trans('navigation.reservation') }}
        </h3>
        <p class="text">
            {{ trans('regular.description') }}
        </p>
        <hr>
        <div class="row">
            <div class="steps col-md-8">
                <div>
                    <h4>
                        1. {{ trans('reservation.choose_boat') }}
                    </h4>
                    <select name="boat_id" id="boat_id" class="form-control" autofocus>
                        @foreach($boats as $boat)
                            <option value="{{ $boat->id }}">{{ $boat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div>
                    <h4>
                        2. {{ trans('reservation.choose_period') }}
                    </h4>
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="input-sm form-control" name="start" />
                        <span class="input-group-addon">{{ trans('reservation.until') }}</span>
                        <input type="text" class="input-sm form-control" name="end" />
                    </div>
                </div>
                <hr>
                <div>
                    <h4>
                        3. {{ trans('reservation.choose_amount_people') }} <small>({{ trans('reservation.including_yourself') }})</small>
                    </h4>
                    <input type="number" value="0" class="form-control">
                </div>
                <br>
                <a href="" class="btn btn-primary pull-right">
                    {{ trans('regular.next') }}
                </a>
            </div>
            <div class="col-md-4">
                <h4>{{ trans('reservation.certainties') }}</h4>
                <ul class="list-unstyled">
                    <li><span class="fa fa-check"></span> {{ trans('reservation.certainties_option_one') }}</li>
                    <li><span class="fa fa-check"></span> {{ trans('reservation.certainties_option_two') }}</li>
                    <li><span class="fa fa-check"></span> {{ trans('reservation.certainties_option_three') }}</li>
                    <li><span class="fa fa-check"></span> {{ trans('reservation.certainties_option_four') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
